<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Halaman indeks berita (listing).
     */
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $query = News::query()
            ->with(['author'])
            ->when($q !== '', function ($qbuilder) use ($q) {
                $qbuilder->where(function ($w) use ($q) {
                    $w->where('title', 'like', "%{$q}%")
                      ->orWhere('excerpt', 'like', "%{$q}%")
                      ->orWhere('content', 'like', "%{$q}%");
                });
            })
            ->where('status', 'published')
            ->orderByDesc('is_pinned')
            ->orderByDesc('published_at')
            ->orderByDesc('id');

        $news = $query->paginate(12)->withQueryString();

        return view('news.index', compact('news'));
    }


    public function show(Request $request, News $news)
    {
        if ($news->status !== 'published' && !$this->isWhitelisted($request->user())) {
            abort(404);
        }

        $news->load([
            'author',
            'images' => function ($q) {
                $q->orderBy('position')->orderBy('id');
            },
        ]);

        $sessionKey = 'news_viewed_' . $news->id;
        if (!$request->session()->has($sessionKey)) {
            $news->increment('view_count');
            $request->session()->put($sessionKey, true);
        }

        return view('news.show', compact('news'));
    }

    protected function isWhitelisted($user): bool
    {
        if (!$user) return false;
        $allowed = array_map('strtolower', config('admin.allowed_emails', []));
        return in_array(strtolower((string) $user->email), $allowed, true);
    }
}

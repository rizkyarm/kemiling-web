@extends('layouts.app')

@section('title', 'Berita | ')

@section('content')
<div class="bg-gray-50">
  <div class="container mx-auto px-4 py-10">
    <div class="max-w-7xl mx-auto mb-8">
      <div class="flex items-center justify-between gap-4">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Berita Terbaru</h1>
          <p class="text-sm text-gray-600 mt-2">Kumpulan informasi terkini dari Kemiling dan sekitarnya.</p>
        </div>

        <form method="GET" action="{{ route('news.index') }}" class="hidden md:block">
          <div class="relative w-80">
            <input
              type="text"
              name="q"
              value="{{ request('q') }}"
              placeholder="Cari judul atau kata kunci…"
              class="w-full rounded-full border border-gray-300 px-4 py-2 pr-10 text-sm focus:border-green-500 focus:ring-green-500"
            />
            <i data-lucide="search" class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
          </div>
        </form>
      </div>
    </div>

    @php
      $pinned = $news->firstWhere('is_pinned', true);
    @endphp

    @if($pinned)
      <div class="max-w-7xl mx-auto mb-10">
        <a href="{{ route('news.show', $pinned) }}" class="group block bg-white rounded-2xl border shadow-sm overflow-hidden">
          <div class="grid grid-cols-1 md:grid-cols-5">
            <div class="md:col-span-3">
              <img
                src="{{ $pinned->cover_image ? asset('storage/'.$pinned->cover_image) : 'https://placehold.co/800x500/eff1f5/9aa0a6?text=Cover' }}"
                alt="{{ $pinned->title }}"
                loading="lazy"
                class="h-72 md:h-full w-full object-cover group-hover:opacity-95 transition"
              >
            </div>
            <div class="md:col-span-2 p-6 md:p-8">
              <span class="inline-flex items-center gap-1 text-xs font-semibold text-green-700 bg-green-100 px-2.5 py-1 rounded-full mb-3">
                <i data-lucide="pin" class="w-3.5 h-3.5"></i> Sorotan
              </span>
              <h2 class="text-2xl md:text-3xl font-bold text-gray-900 group-hover:text-green-700 transition line-clamp-2">
                {{ $pinned->title }}
              </h2>
              <div class="mt-3 flex items-center text-sm text-gray-500 gap-3">
                <span class="inline-flex items-center gap-1">
                  <i data-lucide="calendar" class="w-4 h-4"></i>
                  {{ optional($pinned->published_at)->translatedFormat('d M Y') ?? $pinned->created_at->translatedFormat('d M Y') }}
                </span>
                @if($pinned->author)
                <span class="inline-flex items-center gap-1">
                  <i data-lucide="user" class="w-4 h-4"></i>
                  {{ $pinned->author->name }}
                </span>
                @endif
              </div>
              @if($pinned->excerpt)
                <p class="mt-4 text-gray-600 line-clamp-3">{{ $pinned->excerpt }}</p>
              @endif

              <div class="mt-6">
                <span class="inline-flex items-center gap-2 text-sm font-semibold text-green-700">
                  Baca selengkapnya
                  <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      </div>
    @endif

    <div class="max-w-7xl mx-auto">
      @php
        $items = $pinned ? $news->filter(fn($n) => $n->id !== $pinned->id) : $news;
      @endphp

      @if($items->isEmpty())
        <div class="bg-white rounded-2xl border shadow-sm p-12 text-center">
          <i data-lucide="newspaper" class="w-10 h-10 mx-auto text-gray-400"></i>
          <h3 class="mt-3 text-lg font-semibold text-gray-800">Belum ada berita</h3>
          <p class="mt-1 text-sm text-gray-500">Tunggu kabar terbaru dari kami, ya.</p>
        </div>
      @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($items as $article)
            @include('news.card', ['article' => $article])
          @endforeach
        </div>

        <div class="mt-10">
          {{ $news->appends(['q' => request('q')])->links() }}
        </div>
      @endif
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    if (window.lucide && typeof lucide.createIcons === 'function') {
      lucide.createIcons();
    }
  });
</script>
@endsection

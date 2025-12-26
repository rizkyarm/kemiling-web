@php
  $img = $article->cover_image
    ? asset('storage/'.$article->cover_image)
    : 'https://placehold.co/600x400/eff1f5/9aa0a6?text=Cover';
@endphp

<a href="{{ route('news.show', $article) }}" class="group block bg-white rounded-2xl border shadow-sm overflow-hidden h-full">
  <div class="relative">
    <img
      src="{{ $img }}"
      alt="{{ $article->title }}"
      loading="lazy"
      class="w-full h-48 object-cover group-hover:opacity-95 transition"
    />
    @if($article->is_pinned)
      <span class="absolute top-3 left-3 inline-flex items-center gap-1 bg-green-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full shadow">
        <i data-lucide="pin" class="w-3.5 h-3.5"></i> Sorotan
      </span>
    @endif
  </div>

  <div class="p-5 flex flex-col h-[calc(100%-12rem)]">
    <h3 class="text-lg font-semibold text-gray-900 group-hover:text-green-700 transition line-clamp-2">
      {{ $article->title }}
    </h3>

    <div class="mt-2 flex items-center gap-3 text-xs text-gray-500">
      <span class="inline-flex items-center gap-1">
        <i data-lucide="calendar" class="w-4 h-4"></i>
        {{ optional($article->published_at)->translatedFormat('d M Y') ?? $article->created_at->translatedFormat('d M Y') }}
      </span>
      @if($article->author)
      <span class="inline-flex items-center gap-1">
        <i data-lucide="user" class="w-4 h-4"></i>
        {{ $article->author->name }}
      </span>
      @endif
      @if($article->view_count)
      <span class="inline-flex items-center gap-1">
        <i data-lucide="eye" class="w-4 h-4"></i>
        {{ number_format($article->view_count) }}
      </span>
      @endif
    </div>

    @if($article->excerpt)
      <p class="mt-3 text-sm text-gray-600 line-clamp-3">{{ $article->excerpt }}</p>
    @else
      <p class="mt-3 text-sm text-gray-600 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 140) }}</p>
    @endif

    <div class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-green-700">
      Baca selengkapnya
      <i data-lucide="arrow-right" class="w-4 h-4"></i>
    </div>
  </div>
</a>

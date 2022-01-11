<div class="{{ $classes['container'] }}">
    @if (isset($title) && filled($title))
        <h1 class="{{ $classes['title'] }}">{{ $title }}</h1>
    @endif
    {{ $slot }}
</div>
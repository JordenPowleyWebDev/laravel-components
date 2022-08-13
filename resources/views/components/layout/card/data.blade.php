<div class="{{ $classes['container'] }}">
    @foreach($data as $item)
        <div class="{{ $classes['column'] }}">
            <div class="{{ $classes['label'] }}">{{ $item["label"] }}</div>
            <div class="{{ $classes['value'] }}">
            @if(filled($item["href"]))
                <a href="{{ $item["href"] }}" class="{{ $classes['link'] }}" @if(array_key_exists('target', $item) && filled($item['target']))target="{{ $item['target'] }}" @endif>
                    {{ filled($item["value"]) ? $item["value"] : config('laravel-components.empty-value') }}
                </a>
            @else
                {{ filled($item["value"]) ? $item["value"] : config('laravel-components.empty-value') }}
            @endif
            </div>

        </div>
    @endforeach
</div>
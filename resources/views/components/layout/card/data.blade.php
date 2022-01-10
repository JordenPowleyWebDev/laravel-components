<div class="{{ $classes['container'] }}">
    @foreach($data as $item)
        <div class="{{ $classes['column'] }}">
            <div class="{{ $classes['label'] }}">{{ $item["label"] }}</div>
            <div class="{{ $classes['value'] }}">{{ filled($item["value"]) ? $item["value"] : config('laravel-components.empty-value') }}</div>
        </div>
    @endforeach
</div>
<div class="{{ $classes['container'] }}">
    @if (isset($title) && filled($title))
        <h1 class="{{ $classes['title'] }}">{{ $title }}</h1>
    @endif
    @if (isset($controls) && filled($controls))
        @php
            $newControls = [];
            foreach ($controls as $control) {
                if (filled($control)) {
                    array_push($newControls, $control);
                }
            }
            $controls = $newControls;
            unset($newControls);
        @endphp
        @if (sizeof($controls) === 1)
            {{-- TODO - Import Button --}}
        @else
            {{-- TODO - Import Dropdown --}}
        @endif
    @endif
</div>
<div class="d-flex justify-content-between align-items-center mb-3">
    @if(isset($title) && filled($title))
        <h1 class="h2 m-0 p-0">{{ $title }}</h1>
    @endif
    @if(isset($controls) && filled($controls))
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
        @if(sizeof($controls) === 1)
            @include('components/admin/button', [
                "label" => $controls[0]["label"],
                "link"  => $controls[0]["link"],
                "style" => $controls[0]["style"] ?? "btn-secondary",
            ])
        @else
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="cardHeaderDropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('components/admin/controls.menu') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="cardHeaderDropdownMenuButton">
                    @foreach($controls as $control)
                        @if(array_key_exists("divider", $control))
                            <div class="dropdown-divider"></div>
                        @else
                            <a class="dropdown-item {{ $control['style'] }}" href="{{ $control['link'] }}">{{ $control['label'] }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    @endif
</div>

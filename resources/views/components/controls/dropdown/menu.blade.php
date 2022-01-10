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
<div id="{{ $id }}" class="{{ $classes['container'] }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}-label" aria-hidden="true">
    <div class="{{ $classes['modal-dialog'] }}">
        <form method="{{ $formMethod }}" action="{{ $action }}" class="{{ $classes['form'] }}">
            @if (isset($restMethod) && filled($restMethod))
                @method($restMethod)
            @endif
            @if ($formMethod !== "GET")
                @csrf
            @endif
            <div class="{{ $classes['modal-content'] }}">
                <div class="{{ $classes['modal-header'] }}">
                    <h5 class="{{ $classes['modal-title'] }}" id="{{ $id }}-label">{{ $title }}</h5>
                </div>
                <div class="{{ $classes['modal-body'] }}">
                    <p class="{{ $classes['confirmation-text'] }}">
                        {{ $confirmationText }}
                    </p>
                </div>
                <div class="{{ $classes['modal-footer'] }}">
                    <button type="button" data-dismiss="modal" class="{{ $classes['cancel-button'] }}">
                        {{ $cancellationButtonText }}
                    </button>
                    <button type="submit" class="{{ $classes['confirmation-button'] }}">
                        {{ $confirmationButtonText }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
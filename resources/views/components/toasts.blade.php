<div id="toast-container"></div>
<div>
    @if (session('status'))
        <div class="blade-toast" data-type="info" data-content="{{ json_encode(["messages" => [session('status')]]) }}"></div>
    @endif
    @if (session('success'))
        <div class="blade-toast" data-type="success" data-content="{{ json_encode(["messages" => [session('success')]]) }}"></div>
    @endif
    @if (session('error'))
        <div class="blade-toast" data-type="error" data-content="{{ json_encode(["messages" => [session('error')]]) }}"></div>
    @endif
    @if ($errors->any())
        <div class="blade-toast" data-type="error" data-content="{{ json_encode(["messages" => $errors->all()]) }}"></div>
    @endif
</div>
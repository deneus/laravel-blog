@if ($message = \Illuminate\Support\Facades\Session::get('success'))
    <div class="bs-component">
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            {{ $message }}
        </div>
    </div>
@endif

@if ($message = \Illuminate\Support\Facades\Session::get('warning'))
    <div class="bs-component">
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            {{ $message }}
        </div>
    </div>
@endif

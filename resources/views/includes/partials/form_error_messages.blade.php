@if ($errors->any())
    <div class="alert alert-danger">
        The form as not being completed correctly:
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

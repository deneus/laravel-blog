<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @livewireStyles

    <title>Hello, world!</title>
</head>
<body>

@include('includes.partials.navbar')

@if (\Illuminate\Support\Facades\Auth::user() !== null
  and \Illuminate\Support\Facades\Auth::user()->role === \App\Models\User::ROLE_ADMIN
  and \Illuminate\Support\Facades\Route::getCurrentRoute()->getPrefix() === '/admin'
)
    <div class="container">
        @yield('content')
    </div>
@else
    @yield('content')
@endif

<livewire:counter />

@livewire('counter')

<script src="https://kit.fontawesome.com/ed3a43a5fa.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="//cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
@livewireScripts
</body>
</html>

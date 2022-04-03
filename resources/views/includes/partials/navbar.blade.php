<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="fa-solid fa-house"></i></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles') }}">Articles</a>
                </li>

                @if (\Illuminate\Support\Facades\Auth::user() !== null
                  and \Illuminate\Support\Facades\Auth::user()->role === \App\Models\User::ROLE_ADMIN
                )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.index') }}">Admin</a>
                    </li>
                @endif


            </ul>

            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                @if (\Illuminate\Support\Facades\Auth::user())
                    <li>
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                @else
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

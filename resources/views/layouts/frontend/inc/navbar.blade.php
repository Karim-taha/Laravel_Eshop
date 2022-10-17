<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('homePage') }}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('homePage') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('frontCategory') }}">Categories</a>
        </li>
        @if (Route::has('login'))
                    @auth
                        <a href="#" class="nav-link">{{ Auth::user()->name}}</a>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                        @endif
                    </li>
                    @endauth
            @endif
      </ul>
    </div>
  </nav>

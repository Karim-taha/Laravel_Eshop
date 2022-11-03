<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-4" href="{{ route('homePage') }}">E-Shop</a>
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
        <li class="nav-item">
          <a class="nav-link" href="{{ route('showcart') }}"><i class="fa-solid fa-cart-plus"></i></a>
        </li>

        @if (Route::has('login'))
                    @auth
                    <div class="dropdown mr-4 pr-3">
                        <button class="btn text-light dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                            <span>{{ Auth::user()->name}}</span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#"><i class="fa-solid fa-address-card"></i> Profile</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </ul>
                      </div>
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

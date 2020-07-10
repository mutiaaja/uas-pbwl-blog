<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Blog</title>

    <!-- Scripts -->
   <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Mutia Blog</a>
          <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
           @guest
                @if (Route::has('register'))
              <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              </ul>
            </nav>
            @endif
                @else
                <ul class="navbar-nav px-3x ">
                <li class="nav-item text-nowrap">
                        <a class="nav-link" >{{ Auth::user()->name }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav px-3">
                    
                <li class="nav-item text-nowrap">
                   <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
              </ul>
            </nav>

        <div class="container-fluid">
                  <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                      <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a class="nav-link active" href="{{ url('home') }}">
                              <span data-feather="home"></span>
                              Dashboard 
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  href="{{ url('categories') }}">
                              <span data-feather="file"></span>
                              Category
                            </a>
                          </li>
                          <li class="nav-item" href="{{ url('post') }}">
                            <a class="nav-link" >
                              <span data-feather="shopping-cart"></span>
                              Post
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('photo') }}">
                              <span data-feather="users"></span>
                              Photo
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ url('album') }}">
                              <span data-feather="bar-chart-2"></span>
                              Albums
                            </a>
                          </li>
                        </ul>
                      </div>
                    </nav>
                    @endguest

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">              
            @yield('content')
        </div>
        </main>
    </div>
</div>
</div>

</body>
</html>

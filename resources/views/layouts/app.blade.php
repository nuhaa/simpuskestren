<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css_partials')
</head>
<body>
    <div id="app">
        <nav class="navbar is-primary">
          <div class="navbar-brand">
              <a href="/" class="navbar-item">
                <b>Pendaftaran Pasien Online &nbsp;</b> <small> (Puskestren Tebuireng)</small>
              </a>
              <a class="navbar-burger" role="button" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
              </a>
          </div>

          <div class="navbar-menu" id="navMenu">
            <div class="navbar-end">
              @guest
                <div class="navbar-item">
                  <div class="field is-grouped">
                    <p class="control">
                      <a href="{{ route('login') }}" class="button is-light">Login</a>
                      {{-- <a href="{{ route('register') }}" class="button is-light">Register</a> --}}
                    </p>
                  </div>
                </div>
              @endguest

              @auth
                <div class="navbar-item has-dropdown is-hoverable">
                  <div class="navbar-link">
                    <span>{{ auth()->user()->name }}</span>
                  </div>
                  <div class="navbar-dropdown">
                    {{-- <div class="navbar-item">Test</div> --}}
                    <a href="{{ route('logout') }}" class="navbar-item"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Log Out</a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display:none">
                        @csrf
                    </form>
                  </div>
                </div>
              @endauth
            </div>
          </div>
        </nav>
        <section class="section">
          @auth
          <div class="columns">
              <div class="column is-2">
                <aside class="menu">
                  <p class="menu-label">Selamat Datang, </p>
                  <ul class="menu-list">
                      <li><a href="{{ route('pasien.index') }}" class="{{ Request::path() == "pasien/dashboard" ? "is-active has-background-primary" : "" }}">Dashboard</a></li>
                      <li><a href="{{ route('pasien.profile') }}" class="{{ Request::path() == "pasien/profile" ? "is-active has-background-primary" : "" }}">Profil</a></li>
                      <li><a href="{{ route('pasien.registration') }}" class="{{ Request::path() == "pasien/registration" ? "is-active has-background-primary" : "" }}">Riwayat Pendaftaran</a></li>
                      <li><a href="{{ route('pasien.medical.record') }}" class="{{ Request::path() == "pasien/medical-record" ? "is-active has-background-primary" : "" }}">Rekam Medis</a></li>
                  </ul>
                </aside>
              </div>
              <div class="column is-10">
                @yield('content')
              </div>
          </div>
          @endauth
          @guest
            @yield('content')
          @endguest
        </section>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

          // Add a click event on each of them
          $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {

              // Get the target from the "data-target" attribute
              const target = el.dataset.target;
              const $target = document.getElementById(target);

              // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
              el.classList.toggle('is-active');
              $target.classList.toggle('is-active');

            });
          });
        }

      });
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    @yield('script_part')
</body>
</html>

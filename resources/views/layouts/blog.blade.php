<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
      @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
  </head>
  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button"> &#9776; </button>
             <a class="navbar-brand" href="/">
              <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
              <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
             </a> 
        </div>
      <div>


     @if (auth()->user())
        <section class="navbar-mobile">
         <span class="navbar-divider d-mobile-none"></span>
          <ul class="nav nav-navbar">           
            <li class="nav-item">
             <a class="nav-link" href="#">{{ auth()->user()->name }}<span class="arrow"></span></a>
              <nav class="nav">
                <a class="nav-link" href="{{ route('profile.show') }}">My Profile</a>
                <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                <a class="nav-link" href="{{ route('posts.index') }}">My Posts</a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                  @csrf
                <x-jet-dropdown-link href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                  <div class="btn btn-xs btn-round btn-secondary">{{ __('Log Out') }}</div>
              </x-jet-dropdown-link>
              </form>  
              </nav>
                
            </li>
        </ul>
        </section>
           @else

      <section class="navbar-mobile">
         <span class="navbar-divider d-mobile-none"></span>
          <ul class="nav nav-navbar">           
            <li class="nav-item">
             <a class="nav-link" href="#">Menu<span class="arrow"></span></a>
              <nav class="nav">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </nav>
                
            </li>
        </ul>
        </section>


           
           @endif
        </div>
      </div>
    </nav>
    <!-- /.navbar -->


    @yield('header')


    <!-- Main Content -->
    @yield('content')
               



    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-4 col-lg-6">
            <a href="../index.html"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
          </div>

          <div class="col-8 col-lg-6 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook "   href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter  "   href="https://twitter.com"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram"   href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble "   href="https://dribbble.com"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>
{{-- 
          <div class="col-lg-6">
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
              <a class="nav-link" href="../page/about-1.html">About</a>
              <a class="nav-link" href="../blog/grid.html">Blog</a>
              <a class="nav-link" href="../page/contact-1.html">Contact</a>
            </div>
          </div> --}}

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

  </body>
</html>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
      @trixassets
      @yield('css')
      <style>
         a.btn.btn-info.ml-2.mr-2 {
         color: #fff;
        }
      </style>
     
      <title>@yield('title')</title>
  </head>
  <body>


   <x-app-layout>

   <div class="container mt-5">
    @if (session('success'))
    <div class="alert alert-success successMessage" >
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger errorMessage" >
        {{ session('error') }}
    </div>
    @endif

    <div class="row mobileScreenMessage">
      <div class="col">
          <p class="lead text-center mt-3">
            It seems you are browsing with your mobile phone. If you want to get cms functionality then visit
            laptop or desktop screen size
        </p>
      </div>
    </div>
      <div class="row d-sm-flex d-none">
       
            <div class="col-md-3">
               <div class="card">
                 <div class="card-header">Menu</div>
                  <div class="list-group">
                <a href="{{ route('welcome.home') }}" 
                class="list-group-item list-group-item-action {{ Request::path() == '/' ? 'active' : ''}}">Home</a>
                <a href="{{route('posts.index')}}" 
                class="list-group-item list-group-item-action {{ Request::path() == 'posts' ? 'active' : ''}}">My Posts</a>
                <a href="{{route('categories.index')}}"
                 class="list-group-item list-group-item-action {{ Request::path() == 'categories' ? 'active' : ''}}">Categories</a>
                <a href="{{route('tags.index')}}" 
                class="list-group-item list-group-item-action {{ Request::path() == 'tags' ? 'active' : ''}}">Tags</a>
                <a href="{{route('dashboard')}}"
                 class="list-group-item list-group-item-action {{ Request::path() == 'dashboard' ? 'active' : ''}}">Dashbaord</a>
                <a href="{{route('posts.create')}}"
                 class="list-group-item list-group-item-action {{ Request::path() == 'posts/create' ? 'active' : ''}}">Create Post</a>
                <a href="{{route('categories.create')}}"
                 class="list-group-item list-group-item-action {{ Request::path() == 'categories/create' ? 'active' : ''}}">Create Category</a>
                <a href="{{route('tags.create')}}"
                 class="list-group-item list-group-item-action {{ Request::path() == 'tags/create' ? 'active' : ''}}">Create Tag</a>
                <a href="{{route('trashed-posts.index')}}" 
               class="list-group-item list-group-item-action {{ Request::path() == 'trashed-posts' ? 'active' : ''}}">Trashed</a>
                @if (auth()->user()->role == "admin")
                   <a href="{{route('users.index')}}" 
                   class="list-group-item list-group-item-action {{ Request::path() == 'users' ? 'active' : ''}}">Users</a>
                @endif
                  
            </div> 
          </div>
     </div> 

    <div class="col-md-9">
               @yield('content')
    </div>
   </div>
 </div>
 </x-app-layout>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


   @yield('script')
    <script>
        setTimeout(function() {
        $('.successMessage').fadeOut('slow');
        }, 3000);
        setTimeout(function() {
        $('.errorMessage').fadeOut('slow');
        }, 3000);

           if ($(window).width() < 560) {
                $( document ).ready(function() {
                 $(".mobileScreenMessage").show();
               });
            } else {
                 $('.mobileScreenMessage').hide();
               
            }
    </script>
  </body>
</html>

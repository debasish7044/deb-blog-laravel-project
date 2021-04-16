@extends('layouts.blog')

@section('title')
  Get ready for new blog post
@endsection


@section('header')
      <!-- Header -->
        <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
          <div class="container">
            <div class="row">
              <div class="col-md-8 mx-auto">
                <h1>Latest Blog Posts</h1>
                <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>
              </div>
            </div>
          </div>
        </header>
        <!-- Header -->
@endsection

@section('content')
  

    <!-- Main Content -->
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">

            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">


       @if ($search->count() == 0)
            <h4>No Result Found "<b>{{ request()->query('term') }}</b>"</h2>
            @else
              @foreach ($posts as  $post)
                  <div class="col-md-6">
                  <div class="card border hover-shadow-6 mb-6 d-block">
                    <a href="{{ route('blog.show', $post->id) }}"><img class="card-img-top" src="{{ asset('storage/'.$post->image) }}" style=" height:13rem" alt="Card image cap"></a>
                    <div class="p-6 text-center">
                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{ $post->category->name }}</a></p>
                      <h5 class="mb-0"><a class="text-dark" href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h5>
                    </div>
                  </div>
                </div>
               @endforeach
            @endif     
           
              </div>

                 {{ $posts->links('pagination::simple-bootstrap-4') }}
            </div>
           @include('partials.sidebar')
          </div>
        </div>
      </div>
    </main>

@endsection



















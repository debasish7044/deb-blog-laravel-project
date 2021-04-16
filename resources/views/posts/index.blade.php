@extends('layouts.main')

  @section('content')

   
     {{-- {{ var_dump($post) }} --}}

    <div class="d-flex flex-column align-items-center mb-5">
       <div class="align-self-end">
        <a href=" {{ route('posts.create') }} " class="btn btn-primary mb-3"> Create Post</a>
        </div>
        
          @if ($posts->count() > 0)

            <div class="card" style="width: 100%">
              <div class="card-header">
                  Posts List
              </div>
            <div class="mb-0">
                <table class="table table-bordered mb-0">
              <thead>
                <tr>
                <th scope="col">Image</th>
                <th scope="col">title</th>
                <th scope="col">Category</th>
                <th scope="col"></th>

                </tr>
             </thead>
              <tbody >
              @foreach ($posts as $post )
              <tr>
                <td><img src="{{asset('storage/'.$post->image)}}" alt="" style="width: 50px"></td>
                <td>
                  @if (strlen($post->title) > 30)
                    {{ substr($post->title,0,30) }}..
                  @else
                    {{ $post->title }}
                  @endif
                </td>
                <td><a href="{{route('categories.edit',$post->category->id)}}">{{$post->category->name}}</a></td>
                <td class="text-center">
                 @if (!$post->trashed())
                    <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-sm btn-info ml-2 mr-2">Edit</a>
                 @else
                    <a href="{{route('trashed-posts-store.index' , $post->id)}}" class="btn btn-sm btn-info ml-2 mr-2">Restore</a>
                 @endif
                 <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-sm btn-danger d-inline" >
                      {{ $post->trashed() ? 'Delete' : 'Trashed'}}
                   </button>
                 </form>
                </td>
                </tr>
                  @endforeach
              </tbody>          
              </table>
          </div>
            </div>
           <div class="mt-3">
              {{ $posts->links('pagination::simple-tailwind') }}
           </div>
          @else
              <h2>No Post Yet</h2>
          @endif

    </div>

   @endsection

   





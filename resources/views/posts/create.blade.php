@extends('layouts.main')

   @section('content')

    <div class="d-flex flex-column align-items-center mb-4">

    <div class="card" >
    <div class="card-header">
        {{isset($post) ? 'Update Post' : 'Create Post'}}
    </div>

  <form action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="POST" class="p-3"  enctype="multipart/form-data">

    <!-- 2 column grid layout with text inputs for the first and last names -->
   @if (isset($post))
        @method('PUT')
    @endif
    @csrf

{{-- title input --}}
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
      <label class="form-label" for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control mb-4 @error('title') is-invalid @enderror" value="{{isset($post) ? $post->title : old('title')}}"/>
         @error('title')
                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
         @enderror
      </div>
    </div>


  {{-- description input  --}}
  <div class="form-outline mb-4">
    <label class="form-label" for="description">Description</label>
    <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{isset($post) ? $post->description : old('description')}}</textarea>
    @error('description')
         <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
    @enderror
  </div>


 <div class="form-outline mb-4">
 <label class="form-label" for="content">Content</label>

     {{-- @trix(\App\Post::class, 'content')    --}}
      <textarea class="form-control" id="summary-ckeditor" name="content">{{isset($post) ? $post->content : old('content')}}</textarea>
      @error('content')
         <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
     @enderror
  </div>


   <div class="form-outline">
      <label class="form-label" for="publish_at">Publish At</label>
        <input type="text" id="publish_at" name="publish_at" class="form-control mb-4 @error('publish_at') is-invalid @enderror" value="{{isset($post) ? $post->publish_at : old('publish_at')}}"/>
         <small class="form-text text-muted">If you want publish the post then put current time.</small>

        @error('publish_at')
                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
         @enderror
    </div>

    @if (isset($post))
       <img src="{{asset('storage/'.$post->image)}}" alt="{{$post->name}}" style="width: 20%">
    @endif

    <div class="form-group">
        <label class="mb-2 d-block" for="image">Choose Image</label>
        <input type="file" name="image" id="image" value={{old('image')}} class=" from-control p-2 mb-4 @error('image') is-invalid @enderror"/>
         @error('image')
                <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
         @enderror
     </div>
   </div>
   

    <div class="form-group col-md-4 mb-4">
      <label class="mb-2" for="category">Choose Category</label>
      <select id="category" name="category" class="form-control ">
        @foreach ($categories as $category)
            <option
            @if (isset($post))

            @if ($category->id == $post->category_id)
               selected
            @endif
            @endif
            value="{{$category->id}}"
            >{{$category->name}}</option>
        @endforeach
      </select>
    </div>


    @if ($tags->count() > 0)
    <label class="mb-2" for="tags">Choose Tags</label>
    <select class=" mb-3 form-outline tags-selector" style="width: 100%" name="tags[]" multiple>

        @foreach ($tags as $tag )
            <option value="{{ $tag->id }}"
                @if (isset($post))
                    @if ($post->hasTag($tag->id))
                        selected
                    @endif
                @endif
                >{{$tag->name}}</option>
        @endforeach
    </select>
   @endif


  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-2 mt-5 d-block">
      @if (isset($post))
        Save
      @else
       Add Post
      @endif
  </button>
  </form>
  </div>

   </div>
   @endsection

   

    @section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   
    @endsection

     @section('script')
      
       <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            $('.tags-selector').select2({
            theme: 'bootstrap5',
        });
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            flatpickr("#publish_at",{
              enableTime: true,
              enableSeconds: true
            });
            $(document).ready(function() {
                $('.tags-selector').select2();
            });
            
        </script>
  
       <script>
      window.onload = function() {
        CKEDITOR.replace( 'summary-ckeditor', {
          filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
          filebrowserUploadMethod: 'form'
        });
	};
</script>
        
    @endsection
    
     
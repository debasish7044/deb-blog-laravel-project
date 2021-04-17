   @extends('layouts.main')
    @section('title')
     all Tags
   @endsection

   @section('content')

   {{-- {{$categories->posts}} --}}

    <div class="d-flex flex-column align-items-center mb-5">
    <div class="align-self-end">
      <a href=" {{ route('tags.create') }} " class="btn btn-primary mb-3">Create Tag</a>
    </div>

    <div class="card" style="width: 100%">
          <div class="card-header">
            Tags
          </div>
         @if ($tags->count() > 0)
            <ul class="list-group list-group-flush  p-3">
             @foreach ( $tags as  $tag)
             <div class="list-group">
               <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="#" class="list-group-item list-group-item-action"><div class="d-flex justify-content-between">
                        <span>{{$tag->name}}</span>  <span>Posts: {{$tag->posts->count()}}</span>
                    </div></a>
                    <a href="{{route('tags.edit' , $tag->id)}}" class="btn btn-info ml-2 mr-2">Edit</a>
                    <button type="button" class="btn btn-danger" onclick="handleDelete({{$tag->id}})">
                    Delete
                    </button>
                </div>
            </div>
              @endforeach
            </ul>
            <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <form action="" method="POST" id="deleteCategoryForm">
               @method('DELETE')
               @csrf
             <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Are you sure you want to delete {{$tag->name}} tag ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
            </div>
           </form>
        </div>
        </div>

               {{-- {{ $tag->links('pagination::simple-tailwind') }} --}}

         @else
             <h2 class="p-2 text-center">No Tag Yet</h2>
         @endif
   </div>
   </div>
   @endsection

@section('script')

   <script>
        function handleDelete(id){

            var from = document.getElementById('deleteCategoryForm');
            from.action = '/tags/' + id;
            $('#deleteModal').modal('show')
        }

    </script>

@endsection





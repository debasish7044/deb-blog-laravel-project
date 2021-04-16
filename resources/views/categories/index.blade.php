@extends('layouts.main')

   @section('content')

   {{-- {{$categories->posts}} --}}

    <div class="d-flex flex-column align-items-center mb-5">
    <div class="align-self-end">
        <a href=" {{ route('categories.create') }} " class="btn btn-primary mb-3"> Create Category</a>
    </div>

    <div class="card" style="width: 100%">
          <div class="card-header">
            Categories
          </div>
         @if ($categories->count() > 0)
            <ul class="list-group list-group-flush  p-3">
             @foreach ( $categories as  $category)
             <div class="list-group">
               <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="#" class="list-group-item list-group-item-action"><div class="d-flex justify-content-between">
                     <span>{{substr($category->name, 0,20)}}</span>  <span>Posts: {{$category->posts->count()}}</span>
                    </div>
                    </a>
                    <a href="{{route('categories.edit' , $category->id)}}" class="btn btn-info ml-2 mr-2">Edit</a>
                    <button type="button" class="btn btn-danger" onclick="handleDelete({{$category->id}})">
                    Delete
                    </button>
                </div>
            </div>
           @endforeach
            <!-- Button trigger modal -->
         </ul>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <form action="" method="POST" id="deleteCategoryForm">
               @method('DELETE')
               @csrf
             <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Are you sure you want to delete  category ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
            </div>
           </form>
        </div>
        </div>
        </div>

          <div class="mt-3">
              {{ $categories->links('pagination::simple-tailwind') }}
           </div>
         @else
             <h2 class="p-2 text-center">No Category Yet</h2>
         @endif
   </div>
   </div>
   @endsection

    @section('script')

    <script>
        function handleDelete(id){

            var from = document.getElementById('deleteCategoryForm');
            from.action = '/categories/' + id;
            $('#deleteModal').modal('show')
        }

    </script>

    @endsection


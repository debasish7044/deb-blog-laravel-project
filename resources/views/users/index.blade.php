   @extends('layouts.main')

   @section('title')
     all Users
   @endsection

   @section('content')

    <div class="d-flex flex-column align-items-center mb-5">

    <div class="card" style="width: 80%">
          <div class="card-header">
            Users
          </div>
         @if ($users->count() > 0)
      <table class="table table-bordered m-0">
      <thead>
        <tr>
          <th scope="col">SL</th>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($users as $index => $user)
          <tr>
          <th scope="row">{{ $index + 1 }}</th>
          <td>
            <img src="{{ Gravatar::src($user->email) }}" alt="" srcset="">
          </td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if ($user->role != 'admin')
             <form action="{{ route('users.make-admin',$user->id) }}" method="POST">
               @csrf
              <button type="submit" class="btn btn-sm btn-success">Make Admin</button>
             </form>
             @else
              <form action="{{ route('users.make-writer',$user->id) }}" method="POST">
               @csrf
              <button type="submit" class="btn btn-sm btn-info {{ $user->role == 'admin' && auth()->user()->name == $user->name ? 'disabled' : '' }}">Make Writer</button>
             </form>
            @endif
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
         @else
             <h2 class="p-2 text-center">No Users Yet</h2>
         @endif
   </div>
   </div>
   @endsection







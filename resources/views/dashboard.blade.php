@extends('layouts.main')


   @section('content')

    <div class="card" style="width: 90%">
          <div class="card-header">
             {{ __('Dashboard') }}
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">You are logged in !!</li>
       </ul>
   </div>
   @endsection



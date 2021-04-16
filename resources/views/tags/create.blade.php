@extends('layouts.main')

   @section('content')
  
  <div class="d-flex flex-column align-items-center" >
  <div class="card" style="width:100%">
    
  
    <div class="card-header">
    {{isset($tag) ? 'Update Tag' : 'Create Tag'}}
    </div>
    <form action="{{isset($tag) ? route('tags.update',$tag->id) : route('tags.store')}}" method="POST" class="p-3">
        <!-- Name input -->
        @if (isset($tag))
            @method('PUT')
        @endif
        @csrf

        <div class="form-outline">
        <label class="form-label" for="form7Example1">Name</label>
        <input type="text" name="name" class="form-control p-2" @error('name') is-invalid @enderror value="{{isset($tag) ? $tag->name : ' '}}" />
        @error('name')
            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">{{isset($tag) ? 'Save' : 'Add Category'}}</button>
        </div>
     </form>

    </div>

   </div>
   @endsection



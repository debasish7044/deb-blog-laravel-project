@extends('layouts.main')

   @section('content')

  <div class="d-flex flex-column align-items-center" >
  <div class="card" style="width:100%">


    <div class="card-header">
    {{isset($category) ? 'Update Category' : 'Create Creategory'}}
    </div>
    <form action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST" class="p-3">
        <!-- Name input -->
        @if (isset($category))
            @method('PUT')
        @endif
        @csrf


        <div class="form-outline">
        <label class="form-label" for="form7Example1">Name</label>

        <input type="text" name="name" class="form-control p-2" @error('name') is-invalid @enderror value="{{isset($category) ? $category->name : ' '}}" />
        @error('name')
            <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">{{isset($category) ? 'Save' : 'Add Category'}}</button>
        </div>
    </form>

    </div>

   </div>
   @endsection



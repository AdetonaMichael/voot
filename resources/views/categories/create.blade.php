@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">{{ isset($category)?"Update Category":"Create Category" }}</div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
              <ul class="list-group">
                  @foreach ($errors->all() as $error )
                      <li class="list-group-item text-danger text-center">{{ $error }}</li>
                  @endforeach
              </ul>
        </div>
        @endif
        <form class="form-control" action="{{isset($category)? route('categories.update', $category->id): route('categories.store') }}" method="POST">
            @csrf
            @if(isset($category))
            @method('PUT')
            @endif
            <div class="form-group my-4">
                <label for="category-name">Category Name: </label>
                <input class="form-control" type="text" value="{{ isset($category)? $category->name: "" }}" placeholder="Please Enter Category Name" name="name">
            </div>
             <br>
             <div class="form-group">
                 <button  class="btn btn-success" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> {{ isset($category)? "Update":"Add"}}</button>
             </div>
         </form>
    </div>
</div>
@endsection

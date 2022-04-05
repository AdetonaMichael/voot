@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">{{ isset($tag)?"Update tag":"Create tag" }}</div>
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
        <form class="form-control" action="{{isset($tag)? route('tags.update', $tag->id): route('tags.store') }}" method="POST">
            @csrf
            @if(isset($tag))
            @method('PUT')
            @endif
            <div class="form-group my-4">
                <label for="tag-name">tag Name: </label>
                <input class="form-control" type="text" value="{{ isset($tag)? $tag->name: "" }}" placeholder="Please Enter tag Name" name="name">
            </div>
             <br>
             <div class="form-group">
                 <button  class="btn btn-success" type="submit"><i class="fas fa-plus    "></i> {{ isset($tag)? "Update":"Add"}}</button>
             </div>
         </form>
    </div>
</div>
@endsection

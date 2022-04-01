@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">{{ isset($post)? "Edit Post":"Create Post" }}</div>
    @if($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible" role="alert">
      <span type="button" class="close d-flex justify-content-end" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </span> <h4 class="alert-heading">Error..!!! <i class="fa fa-exclamation" aria-hidden="true"></i></h4>
      <p> {{ $error }}</p> </div>
    @endforeach
  @endif
    <div class="card-body">
        <form action="{{ isset($post)?route('posts.update', $post->id):route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
            @method('PUT')
            @endif
            <div class="form-group">
                <label class="text-muted" for="title">Title</label>
                <input type="text" value="{{ isset($post)? $post->title:"" }}" name="title" placeholder="Enter Title" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="title">Description</label>
                <textarea type="text" name="description" placeholder="Enter Description" class="form-control" cols="5" rows="5">{{ isset($post)? $post->description: "" }}</textarea>
            </div>

            <div class="form-group mt-2">
                <label class="text-muted" for="title">Content</label>
                <textarea type="text" name="content" placeholder="Enter Your Article Here" class="form-control" id="content" cols="10" rows="10">{{ isset($post)? $post->content:"" }}</textarea>
            </div>

            <div class="form-group mt-2">
                <label class="text-muted" for="published_at">Published At</label>
                <input type="text" name="published_at" class="form-control" value="{{ isset($post)? $post->published_at: "" }}" id="published_at">
            </div>
            @if($tags->count() > 0)
            {{-- <div class="form-group mt-2">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                    @foreach ( $tags as $tag )
                    <option value="{{ $tag->id  }}">{{ $tag->name }}</option>
                    @endforeach

                </select>
            </div> --}}
            @endif
            @if(isset($post))
            <div class="form-group mt-2">
                <label for="image">Image</label>
                <img src="/storage/{{ $post->image }}" style="width:100%;" alt="Post Image"/>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            @else

            <div class="form-group mt-2">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
           @endif
           {{-- <div class="form-group mt-2">
            <label for="category">Cateogry</label>
            <select name="category" id="category" class="form-control">
            @foreach($categories as $category)
                <option  value="{{ $category->id }}"
                    @if(isset($post))

                    @if($category->id == $post->category_id)

                    selected @endif
                    @endif>{{ $category->name }}</option>
            @endforeach
            </select>
        </div> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-success text-white btn-sm mt-2">{{ isset($post)?'Update Post': 'Add post' }}</button>
            </div>

            </form>
    </div>
</div>
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
  $('#content').summernote();
});
    flatpickr('#published_at',{
        enableTime:true
    });

    $(".tags-selector").select2({
  tags: true
});
</script>
@endsection

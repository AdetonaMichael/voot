@extends('layouts.app')
@include('partials.success')
@include('partials.error')
@section('css')
<link rel="stylesheet" href="{{ asset('css/successmodal.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')

<div class="d-flex justify-content-end my-2">
    <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
</div>

<div class="card card-default">
    <div class="card-header">Categories</div>
    <div class="card-body">
        @if($categories->count() > 0)
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Post Count</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->posts->count() }}</td>
                    <td><a class="btn  btn-sm bg-light" href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
                    <td><button class="btn btn-danger btn-sm text-white" onclick="handleDelete({{ $category->id }})"><i class="fa fa-trash-can"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center text-danger">NO CATEGORIES YET</div>
        @endif
    </div>
</div>
<!-- Button trigger modal -->

  <!-- Modal -->
  <form action="" id="deleteCategoryForm" method="POST">
    @csrf
    @method('DELETE')
  <div class="modal" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                 </span>
                </div>
                <div class="modal-body justify-content-center">
                    <p>Are you sure you want to Delete This Item</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">No, Go Back</button>
                  <button type="submit" class="btn btn-danger btn-sm">Yes, Delete <i class="fa fa-trash-can"></i></button>
                </div>
              </div>
        </form>

    </div>
  </div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    function handleDelete(id){
        var form = document.getElementById('deleteCategoryForm')
        form.action = '/categories/'+id
        $('#deleteModal').modal('show')

    }
</script>
@endsection

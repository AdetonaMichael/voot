@extends('layouts.app')
@include('partials.success')
@include('partials.error')
@section('css')
<link rel="stylesheet" href="{{ asset('css/successmodal.css') }}">
<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Roboto|Varela+Round') }}">
<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}">
<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
@endsection
@section('content')

<div class="d-flex justify-content-end my-2">
    <a href="{{ route('tags.create') }}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Add tag</a>
</div>

<div class="card card-default">
    <div class="card-header">tags</div>
    <div class="card-body">
        @if($tags->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Post Count</th>
                    <th>Update</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag )
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->posts->count() }}</td>
                    {{-- <td>{{ $category->post->count(); }}</td> --}}
                    <td><a href="{{ route('tags.edit', $tag->id) }}"
                            class="btn btn-sm btn-info ml-4 bg-light"> Edit</a></td>
                    <td><button class="btn btn-danger btn-sm text-white"
                            onclick="handleDelete({{ $tag->id }})"><i class="fa fa-trash-can"></i></button></td>

                </tr>
                <!-----------------------------the Delete Modal------------------------------------------>

                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center text-danger">NO TAGS YET</div>
        @endif
    </div>
</div>

  <form action="" id="deletetagForm" method="POST">
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
<script src="{{ asset('https://code.jquery.com/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js') }}"></script>
<script>
    function handleDelete(id){
        var form = document.getElementById('deletetagForm')
        form.action = '/tags/'+id
        $('#deleteModal').modal('show')

    }
</script>}
@endsection

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end my-2">
    <a class="btn btn-sm btn-success" href="{{ route('posts.create') }}"><i class="fa fa-pen-to-square"></i> Add Post</a>
</div>

<div class="card card-default">
    <div class="card-header"><b><i class="fa fa-file-invoice fa-2x"></i>Posts</b></div>
    <div style="overflow-x:auto;" class="card-body">
        @if($posts->count() >0 )
        <table class="table table-striped">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($posts as $post )
                <tr>
                    <td><img src="{{ $post->image }}" alt="post image" width="50" height="50"></td>
                    <td>{{ $post->title }}</td>
                    <td><a href="{{ route('categories.edit',$post->category->id) }}">{{ $post->category->name }}</a></td>
                     @if(!$post->trashed())
                    <td><a style="border:1px solid gray;" href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-light">Edit</a></td>

                    @else
                    <form action="{{ route('restore-post', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td><button type="submit" style="border:1px solid gray;" class="btn btn-sm btn-light">Restore</button></td>
                    </form>

                    @endif
                    <td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                             {{ $post->trashed()? 'Delete':'Trash' }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center text-danger">CURRENTLY EMPTY</div>
        @endif
    </div>
</div>

@endsection

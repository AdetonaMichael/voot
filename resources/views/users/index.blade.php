@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header"><b><i class="fas fa-user-cog fa-2x"></i> Users</b></div>
    <div style="overflow-x:auto;" class="card-body">
        @if($users->count() >0 )
        <table class="table table-striped">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Posts Count</th>
                <th>Email</th>
                <th>Power</th>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>
                    <td> <div class="avatar"><img style="border-radius:45px" src="{{ $user->image }}" alt="..." height="60" width="60" class="img-fluid"></div></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->posts->count() }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->isAdmin())
                        <form action="{{ route('users.remove-admin', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-secondary">Remove</button>

                        </form>
                        @elseif ($user->isSuperAdmin())
                        <span class="text-danger"><b>Boss</b></span>
                        @else
                        <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-secondary">Make</button>

                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center text-danger">No Users Yet</div>
        @endif
    </div>
</div>

@endsection

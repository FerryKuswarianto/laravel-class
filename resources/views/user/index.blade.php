@extends('layout.master')
@section('main')

<a href="{{ route('user.create') }}" class="btn btn-primary btn-success">Add</a>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach ($users as $user)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop


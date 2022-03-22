@extends('adminlte::page')

@section('title', 'Users')

@section('js')
<script type="text/javascript">
function deleteUser(id) {
    if(confirm('Are you sure you want to delete this user?')) {
        document.querySelector('#delete-' + id).submit();
    }
}
</script>
@endsection
@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Users</h3>
            <div class="card-tools">
                <a class="btn btn-info btn-sm" href="{{ route('admin.users.create') }}">
                    <i class="fas fa-user-plus fa-fw mr-1"></i> Add New
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roleName() }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                    </td>
                    <td>
                        <a href="#" onclick="deleteUser({{ $user->id }})">Delete</a>
                        <form style="display:none" method="POST" id="delete-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

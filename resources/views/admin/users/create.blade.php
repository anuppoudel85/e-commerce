@extends('adminlte::page')

@section('title', 'Add New Users')

@section('plugins.Select2', true)

@section('js')
<script>
    $(document).ready(function() {
        $('#role').select2();
    });
</script>
@endsection
@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Create New User</h3>
            <div class="card-tools">
                <a class="btn btn-success btn-sm" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-arrow-left fa-fw mr-1"></i> Go Back
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.users.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name') ?? "" }}">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @endif" value="{{ old('email') ?? "" }}">
                    @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @endif" value="{{ old('password') ?? "" }}">
                    @error('password')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @endif">
                        <option value="0">User</option>
                        <option value="1">Seller</option>
                        <option value="2">Admin</option>
                    </select>
                    @error('role')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-plus fa-fw mr-1"></i> Create New User
                </button>
            </form>

        </div>
    </div>

@stop

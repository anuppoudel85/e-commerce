@extends('adminlte::page')

@section('title', 'Add New Category')

@section('plugins.Select2', true)

@section('js')
<script>
    $(document).ready(function() {
        $('#category_id').select2();
    });
</script>
@endsection
@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Create New Category</h3>
            <div class="card-tools">
                <a class="btn btn-success btn-sm" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-arrow-left fa-fw mr-1"></i> Go Back
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name') ?? "" }}">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @endif" value="{{ old('slug') ?? "" }}">
                    @error('slug')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Parent Category</label>
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @endif">
                        <option value="">No Parent</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-plus fa-fw mr-1"></i> Create New Category
                </button>
            </form>

        </div>
    </div>

@stop

@extends('adminlte::page')

@section('title', 'Add New Product')

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
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Add New Product</h3>
            <div class="card-tools">
                <a class="btn btn-success btn-sm" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-arrow-left fa-fw mr-1"></i> Go Back
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.products.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name') ?? "" }}">
                    @error('name')
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


                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @endif" value="{{ old('price') ?? "" }}">
                    @error('price')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="sale_price">Sale Price</label>
                    <input type="number" name="sale_price" id="sale_price" class="form-control @error('sale_price') is-invalid @endif" value="{{ old('sale_price') ?? "" }}">
                    @error('sale_price')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                    
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @endif">{{ old('description') ?? "" }}</textarea>
                    @error('description')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-plus fa-fw mr-1"></i> Add New Product
                </button>
            </form>

        </div>
    </div>

@stop

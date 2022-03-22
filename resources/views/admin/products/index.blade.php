@extends('adminlte::page')

@section('title', 'Products')

@section('js')
<script type="text/javascript">
function deleteProduct(id) {
    if(confirm('Are you sure you want to delete this product?')) {
        document.querySelector('#delete-' + id).submit();
    }
}
</script>
@endsection
@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Products</h3>
            <div class="card-tools">
                <a class="btn btn-info btn-sm" href="{{ route('admin.products.create') }}">
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
                    <th>Price</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                    <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a>
                    </td>
                    <td>{!! $product->currentPrice() !!}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                    </td>
                    <td>
                        <a href="#" onclick="deleteProduct({{ $product->id }})">Delete</a>
                        <form style="display:none" method="POST" id="delete-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}">
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

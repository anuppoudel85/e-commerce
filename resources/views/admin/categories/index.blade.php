@extends('adminlte::page')

@section('title', 'Categories')

@section('js')
<script type="text/javascript">
function deleteCategory(id) {
    if(confirm('Are you sure you want to delete this category?')) {
        document.querySelector('#delete-' + id).submit();
    }
}
</script>
@endsection
@section('content')

    <x-alert />

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">All Categories</h3>
            <div class="card-tools">
                <a class="btn btn-info btn-sm" href="{{ route('admin.categories.create') }}">
                    <i class="fas fa-plus-circle fa-fw mr-1"></i> Add New
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
                    </td>
                    <td>
                        {{ $category->slug }}
                    </td>
                    <td>
                        @if($category->category_id)
                        <a href="{{ route('admin.categories.show', $category->category_id) }}">{{ $category->category->name }}</a>
                        @endif
                    </td>
                    
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                    </td>
                    <td>
                        <a href="#" onclick="deleteCategory({{ $category->id }})">Delete</a>
                        <form style="display:none" method="POST" id="delete-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}">
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

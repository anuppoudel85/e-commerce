@extends('adminlte::page')

@section('title', 'Categories')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Category: {{ $category->name }}</h3>
            <div class="card-tools">
                <a class="btn btn-success btn-sm" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-arrow-left fa-fw mr-1"></i> Go Back
                </a>
            </div>
        </div>
        <div class="card-body">
           
            <table class="table table-bordered">

                <tr>
                    <td>ID:</td>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <td>Slug:</td>
                    <td>{{ $category->slug }}</td>
                </tr>
                <tr>
                    <td>Parent Category: </td>
                    <td>
                        @if($category->category_id)
                        <a href="{{ route('admin.categories.show', $category->category_id) }}">{{ $category->category->name }}</a>
                        @else
                            No Parent
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>Child Categories:</td>
                    <td>
                        @if(count($category->categories) > 0)

                        <ul>
                            @foreach($category->categories as $child)
                            <li>
                                <a href="{{ route('admin.categories.show', $child->id) }}">
                                    {{ $child->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        @endif
                    </td>
                </tr>

            </table>

                
        </div>
    </div>
@stop

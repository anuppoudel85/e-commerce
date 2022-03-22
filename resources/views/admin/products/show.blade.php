@extends('adminlte::page')

@section('title', 'Products')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size:1.5em;font-weight: bold">Product: {{ $product->name }}</h3>
            <div class="card-tools">
                <a class="btn btn-success btn-sm" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-arrow-left fa-fw mr-1"></i> Go Back
                </a>
            </div>
        </div>
        <div class="card-body">
           
            <table class="table table-bordered">

                <tr>
                    <td>ID:</td>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <td>On Sale? </td>
                    <td>{{ $product->on_sale ? "Yes" : "No" }}</td>
                </tr>
                @if($product->on_sale)
                <tr>
                    <td>Sale Price:</td>
                    <td>{{ $product->sale_price }}</td>
                </tr>
                @endif
                <tr>
                    <td>Parent Category: </td>
                    <td>
                        @if($product->category_id)
                        <a href="{{ route('admin.categories.show', $product->category_id) }}">{{ $product->category->name }}</a>
                        @else
                            No Parent
                        @endif
                    </td>
                </tr>
            </table>

                
        </div>
    </div>
@stop

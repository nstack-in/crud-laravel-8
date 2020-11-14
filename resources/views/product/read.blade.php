@extends('layouts.app')

@section('content')

<div class="card my-4">
    <div class="card-header">Product Detail</div>
    <div class="card-body p-0">
        <table class="table table-bordered m-0">
            <tr>
                <th>ID</th>
                <td> {{ $product->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td> {{ $product->name }}</td>
            </tr>
            <tr>
                <th>Brand</th>
                <td> {{ $product->brand }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td> {{ $product->price }}</td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('product.edit', $product->id  )}}" class="btn btn-warning">Edit</a>
        <button class="btn btn-danger"
            onclick="document.getElementById('delete-form').submit()">Delete</button>

        <form id="delete-form" action="{{ route('product.delete',  $product->id )}}" method="post" class="d-none">
            @csrf
            <input type="hidden" name="_method" value="delete">
        </form>

    </div>
</div>


@endsection
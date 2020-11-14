@extends('layouts.app')

@section('content')

<div class="my-4">
    @if (session('message'))
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
    @endif

    <div class="d-flex my-2 justify-content-end">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        @foreach($products as $product)

            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->brand }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('product.read',$product->id ) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('product.edit',$product->id ) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>

        @endforeach

    </table>
</div>
@endsection
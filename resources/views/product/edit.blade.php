@extends('layouts.app')

@section('content')

<div class="card my-4">
    <div class="card-header">
        Edit Product
    </div>
    <div class="card-body">

        @if (session('message'))
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
        @endif

        <form action="{{ route('product.update', $product->id ) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" value="{{ old('name') ?? $product->name }}">
                <div class="invalid-feedback">
                    {{ $errors->getBag('default')->first('name') }}
                </div>
            </div>
            
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control {{$errors->has('brand') ? 'is-invalid' : ''}}" id="brand" name="brand" value="{{ old('brand') ?? $product->brand }}">
                <div class="invalid-feedback">
                    {{ $errors->getBag('default')->first('brand') }}
                </div>
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" id="price" name="price" value="{{ old('price') ??$product->price }}">
                <div class="invalid-feedback">
                    {{ $errors->getBag('default')->first('price') }}
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</div>

@endsection

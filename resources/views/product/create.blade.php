@extends('layouts.app')

@section('content')

<div class="card my-4">
    <div class="card-header">
        Create Product
    </div>
    <div class="card-body">

        @if (session('message'))
        <div class="alert alert-primary">
            {{ session('message') }}
        </div>
        @endif

        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" value="{{old('name')}}">
                <div class="invalid-feedback">
                    {{ $errors->getBag('default')->first('name') }}
                </div>
            </div>
            
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control {{$errors->has('brand') ? 'is-invalid' : ''}}" id="brand" name="brand" value="{{old('brand')}}">
                <div class="invalid-feedback">
                    {{ $errors->getBag('default')->first('brand') }}
                </div>
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" id="price" name="price" value="{{old('price')}}">
                <div class="invalid-feedback">
                    {{ $errors->getBag('default')->first('price') }}
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Save</button>

        </form>
    </div>
</div>

@endsection

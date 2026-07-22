@extends('layouts.app')
@section('content')
<h4 class="mb-3">Edit Product</h4>
<div class="card shadow-sm" style="max-width:500px">
    <div class="card-body">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Price (LKR)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>📦 Products</h4>
    <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add Product</a>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr><th>#</th><th>Name</th><th>Price</th><th>Quantity</th><th>Actions</th></tr>
            </thead>
            <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->product_name }}</td>
                <td>LKR {{ number_format($p->price, 2) }}</td>
                <td>
                    <span class="badge {{ $p->quantity < 5 ? 'bg-danger' : 'bg-success' }}">
                        {{ $p->quantity }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $p) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
@endsection
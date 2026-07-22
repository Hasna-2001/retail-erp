@extends('layouts.app')
@section('content')
<h4 class="mb-3">📋 Inventory Report</h4>

@if($lowStock->count())
<div class="alert alert-danger">
    ⚠️ <strong>Low Stock Products (below 5):</strong>
    {{ $lowStock->pluck('product_name')->join(', ') }}
</div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark"><tr><th>Product</th><th>Price</th><th>Stock</th><th>Status</th></tr></thead>
            <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->product_name }}</td>
                <td>LKR {{ number_format($p->price, 2) }}</td>
                <td>{{ $p->quantity }}</td>
                <td>
                    @if($p->quantity == 0)
                        <span class="badge bg-danger">Out of Stock</span>
                    @elseif($p->quantity < 5)
                        <span class="badge bg-warning text-dark">Low Stock</span>
                    @else
                        <span class="badge bg-success">In Stock</span>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
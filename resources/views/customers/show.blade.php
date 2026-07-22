@extends('layouts.app')
@section('content')
<h4 class="mb-3">Purchase History — {{ $customer->customer_name }}</h4>
<a href="{{ route('customers.index') }}" class="btn btn-secondary mb-3">← Back</a>
@forelse($customer->sales as $sale)
<div class="card mb-3 shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <span>Sale Date: {{ $sale->sale_date }}</span>
        <strong>Total: LKR {{ number_format($sale->total_amount, 2) }}</strong>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <thead><tr><th>Product</th><th>Qty</th><th>Unit Price</th><th>Subtotal</th></tr></thead>
            <tbody>
            @foreach($sale->saleDetails as $d)
            <tr>
                <td>{{ $d->product->product_name }}</td>
                <td>{{ $d->quantity }}</td>
                <td>LKR {{ number_format($d->price, 2) }}</td>
                <td>LKR {{ number_format($d->quantity * $d->price, 2) }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@empty
<p class="text-muted">No purchases yet.</p>
@endforelse
@endsection
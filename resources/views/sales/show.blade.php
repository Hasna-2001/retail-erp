@extends('layouts.app')
@section('content')
<h4 class="mb-3">Sale #{{ $sale->id }}</h4>
<a href="{{ route('sales.index') }}" class="btn btn-secondary mb-3">← Back</a>
<div class="card shadow-sm">
    <div class="card-header">
        <strong>Customer:</strong> {{ $sale->customer->customer_name }} &nbsp;|&nbsp;
        <strong>Date:</strong> {{ $sale->sale_date }}
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="table-dark"><tr><th>Product</th><th>Qty</th><th>Unit Price</th><th>Subtotal</th></tr></thead>
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
            <tfoot>
                <tr><td colspan="3" class="text-end"><strong>Total</strong></td>
                <td><strong>LKR {{ number_format($sale->total_amount, 2) }}</strong></td></tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
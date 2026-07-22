@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>🛒 Sales</h4>
    <a href="{{ route('sales.create') }}" class="btn btn-primary">+ New Sale</a>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr><th>#</th><th>Date</th><th>Customer</th><th>Total</th><th>View</th></tr>
            </thead>
            <tbody>
            @foreach($sales as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->sale_date }}</td>
                <td>{{ $s->customer->customer_name }}</td>
                <td>LKR {{ number_format($s->total_amount, 2) }}</td>
                <td><a href="{{ route('sales.show', $s) }}" class="btn btn-sm btn-info text-white">View</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $sales->links() }}
    </div>
</div>
@endsection
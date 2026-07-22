@extends('layouts.app')
@section('content')
<h4 class="mb-3">📈 Sales Report</h4>
<div class="mb-3">
    <a href="{{ route('reports.sales', ['type'=>'daily']) }}" class="btn {{ $type=='daily' ? 'btn-primary' : 'btn-outline-primary' }}">Daily</a>
    <a href="{{ route('reports.sales', ['type'=>'monthly']) }}" class="btn {{ $type=='monthly' ? 'btn-primary' : 'btn-outline-primary' }}">Monthly</a>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark"><tr><th>Sale ID</th><th>Date</th><th>Customer</th><th>Total</th></tr></thead>
            <tbody>
            @forelse($sales as $s)
            <tr>
                <td>#{{ $s->id }}</td>
                <td>{{ $s->sale_date }}</td>
                <td>{{ $s->customer->customer_name }}</td>
                <td>LKR {{ number_format($s->total_amount, 2) }}</td>
            </tr>
            @empty
            <tr><td colspan="4" class="text-center text-muted">No sales found</td></tr>
            @endforelse
            </tbody>
            <tfoot>
                <tr><td colspan="3" class="text-end"><strong>Grand Total</strong></td>
                <td><strong>LKR {{ number_format($total, 2) }}</strong></td></tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
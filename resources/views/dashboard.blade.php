@extends('layouts.app')
@section('content')
<h4 class="mb-4">📊 Dashboard</h4>
<div class="row g-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6>Total Products</h6>
                <h2>{{ $totalProducts }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6>Total Customers</h6>
                <h2>{{ $totalCustomers }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6>Total Sales</h6>
                <h2>{{ $totalSales }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h6>Today's Revenue</h6>
                <h2>LKR {{ number_format($todaySales, 2) }}</h2>
            </div>
        </div>
    </div>
</div>

@if($lowStock->count())
<div class="mt-4">
    <div class="alert alert-danger">
        <strong>⚠️ Low Stock Alert!</strong>
        <ul class="mb-0 mt-2">
            @foreach($lowStock as $p)
                <li>{{ $p->product_name }} — only {{ $p->quantity }} left</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
@endsection
@extends('layouts.app')
@section('content')
<h4 class="mb-3">Edit Customer</h4>
<div class="card shadow-sm" style="max-width:500px">
    <div class="card-body">
        <form action="{{ route('customers.update', $customer) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input type="text" name="customer_name" class="form-control" value="{{ $customer->customer_name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" value="{{ $customer->contact_number }}">
            </div>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
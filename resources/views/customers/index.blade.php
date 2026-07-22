@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>👥 Customers</h4>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">+ Add Customer</a>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr><th>#</th><th>Name</th><th>Contact</th><th>Actions</th></tr>
            </thead>
            <tbody>
            @foreach($customers as $c)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->customer_name }}</td>
                <td>{{ $c->contact_number ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('customers.show', $c) }}" class="btn btn-sm btn-info text-white">History</a>
                    <a href="{{ route('customers.edit', $c) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('customers.destroy', $c) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $customers->links() }}
    </div>
</div>
@endsection
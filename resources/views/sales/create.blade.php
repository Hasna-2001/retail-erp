@extends('layouts.app')
@section('content')
<h4 class="mb-3">New Sale</h4>
<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('sales.store') }}" method="POST" id="saleForm">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Customer</label>
                    <select name="customer_id" class="form-select" required>
                        <option value="">-- Select Customer --</option>
                        @foreach($customers as $c)
                            <option value="{{ $c->id }}">{{ $c->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Sale Date</label>
                    <input type="date" name="sale_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
            </div>

            <h6>Products</h6>
            <div id="productRows">
                <div class="row mb-2 product-row">
                    <div class="col-md-7">
                        <select name="products[0][product_id]" class="form-select" required>
                            <option value="">-- Select Product --</option>
                            @foreach($products as $p)
                                <option value="{{ $p->id }}">{{ $p->product_name }} (Stock: {{ $p->quantity }}) — LKR {{ $p->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="products[0][quantity]" class="form-control" placeholder="Qty" min="1" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-row">✕</button>
                    </div>
                </div>
            </div>

            <button type="button" id="addRow" class="btn btn-outline-secondary btn-sm mt-2">+ Add Product</button>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Record Sale</button>
                <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
let rowIndex = 1;
document.getElementById('addRow').addEventListener('click', function () {
    const container = document.getElementById('productRows');
    const template = container.querySelector('.product-row').cloneNode(true);
    template.querySelectorAll('select, input').forEach(el => {
        el.name = el.name.replace(/\[\d+\]/, `[${rowIndex}]`);
        el.value = '';
    });
    container.appendChild(template);
    rowIndex++;
});
document.getElementById('productRows').addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-row')) {
        const rows = document.querySelectorAll('.product-row');
        if (rows.length > 1) e.target.closest('.product-row').remove();
    }
});
</script>
@endpush
<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'contact_number' => 'nullable|string|max:20',
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer added!');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name' => 'required',
            'contact_number' => 'nullable|string|max:20',
        ]);
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted!');
    }

    public function show(Customer $customer)
    {
        $customer->load('sales.saleDetails.product');
        return view('customers.show', compact('customer'));
    }
}
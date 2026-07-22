<?php
namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('customer')->latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::where('quantity', '>', 0)->get();
        return view('sales.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'sale_date'   => 'required|date',
            'products'    => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity'   => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $total = 0;
            $sale = Sale::create([
                'customer_id'  => $request->customer_id,
                'sale_date'    => $request->sale_date,
                'total_amount' => 0,
            ]);

            foreach ($request->products as $item) {
                $product = Product::findOrFail($item['product_id']);
                $lineTotal = $product->price * $item['quantity'];
                $total += $lineTotal;

                SaleDetail::create([
                    'sale_id'    => $sale->id,
                    'product_id' => $product->id,
                    'quantity'   => $item['quantity'],
                    'price'      => $product->price,
                ]);

                $product->decrement('quantity', $item['quantity']);
            }

            $sale->update(['total_amount' => $total]);
        });

        return redirect()->route('sales.index')->with('success', 'Sale recorded!');
    }

    public function show(Sale $sale)
    {
        $sale->load('customer', 'saleDetails.product');
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale) {}
    public function update(Request $request, Sale $sale) {}
    public function destroy(Sale $sale) {}
}
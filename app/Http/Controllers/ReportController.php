<?php
namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function salesReport(Request $request)
    {
        $type = $request->get('type', 'daily');
        $sales = $type === 'monthly'
            ? Sale::with('customer')->whereMonth('sale_date', now()->month)->get()
            : Sale::with('customer')->whereDate('sale_date', today())->get();

        $total = $sales->sum('total_amount');
        return view('reports.sales', compact('sales', 'total', 'type'));
    }

    public function inventoryReport()
    {
        $products = Product::all();
        $lowStock = Product::where('quantity', '<', 5)->get();
        return view('reports.inventory', compact('products', 'lowStock'));
    }
}
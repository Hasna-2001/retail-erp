<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();
        $totalSales = Sale::count();
        $todaySales = Sale::whereDate('sale_date', today())->sum('total_amount');
        $lowStock = Product::where('quantity', '<', 5)->get();

        return view('dashboard', compact(
            'totalProducts','totalCustomers','totalSales','todaySales','lowStock'
        ));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::where('is_archived', false)->count();

        $customerCount = Customer::count();

        $staffCount = User::count();

        $saleCount = Sale::count();

        $totalSales = Sale::sum('total_price');

        $lowStockProducts = Product::where('is_archived', false)
            ->where('stock_quantity', '<=', 5)
            ->get();

        return view('dashboard', [
            'productCount' => $productCount,
            'customerCount' => $customerCount,
            'staffCount' => $staffCount,
            'saleCount' => $saleCount,
            'totalSales' => $totalSales,
            'lowStockProducts' => $lowStockProducts,
        ]);
    }
}
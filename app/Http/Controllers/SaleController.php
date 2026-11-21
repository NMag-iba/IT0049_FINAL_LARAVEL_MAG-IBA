<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['product', 'customer', 'staff'])
            ->latest()
            ->get();

        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        $customers = Customer::orderBy('full_name')->get();

        return view('sales.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'customer_id' => ['nullable', 'exists:customers,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $sale = DB::transaction(function () use ($validated) {
            $product = Product::whereKey($validated['product_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($validated['quantity'] > $product->stock_quantity) {
                throw ValidationException::withMessages([
                    'quantity' => 'Insufficient stock. Only '
                        . $product->stock_quantity
                        . ' item(s) are available.',
                ]);
            }

            $totalPrice = round(
                (float) $product->price * $validated['quantity'],
                2
            );

            $product->decrement(
                'stock_quantity',
                $validated['quantity']
            );

            return Sale::create([
                'product_id' => $product->id,
                'customer_id' => $validated['customer_id'] ?? null,
                'sold_by' => auth()->id(),
                'quantity' => $validated['quantity'],
                'total_price' => $totalPrice,
            ]);
        });

        return redirect()
            ->route('sales.show', $sale)
            ->with('success', 'Sale recorded successfully.');
    }

    public function show(Sale $sale)
    {
        $sale->load(['product', 'customer', 'staff']);

        return view('sales.show', compact('sale'));
    }
}
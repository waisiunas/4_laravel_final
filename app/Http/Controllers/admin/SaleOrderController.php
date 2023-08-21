<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\SaleOrder;
use Illuminate\Http\Request;

class SaleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sale_order.index', [
            'sale_orders' => SaleOrder::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sale_order.create', [
            'customers' => Customer::all(),
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => ['required'],
            'product_id' => ['required'],
            'quantity' => ['required'],
            'price' => ['required'],
            'date' => ['required'],
        ]);

        $data = [
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'order_date' => $request->date,
        ];

        $is_created = SaleOrder::create($data);

        if ($is_created) {
            $inventory = Inventory::where('product_id', $request->product_id)->first();

            $data = [
                'current_quantity' => $inventory->current_quantity - $request->quantity,
                'sold_quantity' => $inventory->sold_quantity + $request->quantity,
            ];

            $is_updated = $inventory->update($data);

            $message = $is_updated ? ['success' => 'Magic has been spelled'] : ['failure' => 'Magic has become a shopper!'];

            return back()->with($message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

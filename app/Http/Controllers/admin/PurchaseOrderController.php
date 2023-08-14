<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\Vendor;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    private $currencies = [
        'USD',
        'GBP',
        'PKR',
    ];
    private $types = [
        'Bundle',
        'Piece',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.puchase_order.index', [
            'purchase_orders' => PurchaseOrder::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.puchase_order.create', [
            'vendors' => Vendor::all(),
            'products' => Product::all(),
            'types' => $this->types,
            'currencies' => $this->currencies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => ['required'],
            'product_id' => ['required'],
            'date' => ['required'],
            'quantity' => ['required'],
            'type' => ['required'],
            'price' => ['required'],
            'currency' => ['required'],
        ]);

        $data = [
            'vendor_id' => $request->vendor_id,
            'product_id' => $request->product_id,
            'order_date' => $request->date,
            'quantity' => $request->quantity,
            'purchase_type' => $request->type,
            'price' => $request->price,
            'currency' => $request->currency,
            'discount' => $request->discount,
            'pieces_per_bundle' => $request->pieces_per_bundle,
        ];

        $is_created = PurchaseOrder::create($data);

        $message = $is_created ? ['success' => 'Magic has been spelled'] : ['failure' => 'Magic has become a shopper!'];

        return back()->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchase_order)
    {
        return view('admin.puchase_order.show', [
            'purchase_order' => $purchase_order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchase_order)
    {
        return view('admin.puchase_order.edit', [
            'vendors' => Vendor::all(),
            'products' => Product::all(),
            'types' => $this->types,
            'currencies' => $this->currencies,
            'purchase_order' => $purchase_order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseOrder $purchase_order)
    {
        $request->validate([
            'vendor_id' => ['required'],
            'product_id' => ['required'],
            'date' => ['required'],
            'quantity' => ['required'],
            'type' => ['required'],
            'price' => ['required'],
            'currency' => ['required'],
        ]);

        $data = [
            'vendor_id' => $request->vendor_id,
            'product_id' => $request->product_id,
            'order_date' => $request->date,
            'quantity' => $request->quantity,
            'purchase_type' => $request->type,
            'price' => $request->price,
            'currency' => $request->currency,
            'discount' => $request->discount,
            'pieces_per_bundle' => $request->pieces_per_bundle,
        ];

        $is_updated = $purchase_order->update($data);

        $message = $is_updated ? ['success' => 'Magic has been spelled'] : ['failure' => 'Magic has become a shopper!'];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchase_order)
    {
        $is_deleted = $purchase_order->delete();

        $is_deleted ? $message = ['success' => 'Vendor deleted Successfully!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }
}

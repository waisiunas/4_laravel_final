<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.inventory.index', [
            'inventories' => Inventory::with('product')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        $walls = [1, 2, 3, 4];
        $sections = [
            'Wash and Wear',
            'Cotton',
        ];
        $racks = [
            'A',
            'B',
            'C',
            'D',
        ];
        $shelves = [
            '1A',
            '2A',
            '1B',
            '2B',
            '1C',
            '2C',
            '1D',
            '2D',
        ];
        return view('admin.inventory.edit', [
            'inventory' => $inventory,
            'walls' => $walls,
            'sections' => $sections,
            'racks' => $racks,
            'shelves' => $shelves,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_quantity(Request $request, Inventory $inventory)
    {
        $request->validate([
            'damaged_quantity' => ['required'],
        ]);

        if ($inventory->current_quantity > $request->damaged_quantity) {
            $data = [
                'damaged_quantity' => $request->damaged_quantity,
                'current_quantity' => $inventory->current_quantity - $request->damaged_quantity,
            ];

            $is_updated = $inventory->update($data);

            $message = $is_updated ? ['success' => 'Magic has been spelled'] : ['failure' => 'Magic has become a shopper!'];

            return back()->with($message);
        } else {
            return back()->withErrors([
                'damaged_quantity' => 'Damaged quantity must be less than current quantity',
            ]);
        }
    }

    public function update_location(Request $request, Inventory $inventory)
    {
        $request->validate([
            'wall' => ['required'],
            'section' => ['required'],
            'rack' => ['required'],
            'shelf' => ['required'],
        ]);

        $data = [
            'wall_no' => $request->wall,
            'section' => $request->section,
            'rack_no' => $request->rack,
            'shelf_no' => $request->shelf,
        ];

        $is_updated = $inventory->update($data);

        $message = $is_updated ? ['success' => 'Magic has been spelled'] : ['failure' => 'Magic has become a shopper!'];

        return back()->with($message);
    }
}

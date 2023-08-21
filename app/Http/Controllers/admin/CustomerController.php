<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer.index', [
            'customers' => Customer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:customers,email'],
            'phone_no' => ['required', 'unique:customers,phone_no'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
        ];

        $is_created = Customer::create($data);

        $message = $is_created ? ['success' => 'Magic has been spelled!'] : ['failure' => 'Magic has become a shopper!'];

        return back()->with($message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:customers,email,' . $customer->id . ',id'],
            'phone_no' => ['required', 'unique:customers,phone_no,' . $customer->id . ',id'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
        ];

        $is_updated = $customer->update($data);

        $is_updated ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become a shopper!'];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $is_deleted = $customer->delete();

        $is_deleted ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become a shopper!'];

        return back()->with($message);
    }
}

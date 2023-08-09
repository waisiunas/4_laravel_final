<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    private $titles = [
        'Mr.',
        'Mrs.',
        'Ms.',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vendor.index', [
            'vendors' => Vendor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.vendor.create', [
            'titles' => $this->titles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => ['required'],
            'title' => ['required'],
            'first_name' => ['required'],
            'email' => ['required', 'unique:vendors,email'],
            'phone_no' => ['required', 'unique:vendors,phone_no'],
            'address' => ['required'],
        ]);

        $data = [
            'company_name' => $request->company_name,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'website' => $request->website,
            'address' => $request->address,
        ];

        $is_created = Vendor::create($data);

        $message = $is_created ? ['success' => 'Vendor added Successfully!'] : ['failure' => 'Magic has become a shopper!'];

        return back()->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {

        return view('admin.vendor.edit', [
            'vendor' => $vendor,
            'titles' => $this->titles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'company_name' => ['required'],
            'title' => ['required'],
            'first_name' => ['required'],
            'email' => ['required', 'unique:vendors,email,' . $vendor->id . ',id'],
            'phone_no' => ['required', 'unique:vendors,phone_no,' . $vendor->id . ',id'],
            'address' => ['required'],
        ]);

        $data = [
            'company_name' => $request->company_name,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'website' => $request->website,
            'address' => $request->address,
        ];

        $is_updated = $vendor->update($data);

        $is_updated ? $message = ['success' => 'Vendor information updated successfully!'] : $message = ['failure' => 'Failed to update vendor information!'];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $is_deleted = $vendor->delete();

        $is_deleted ? $message = ['success' => 'Vendor deleted Successfully!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }
}

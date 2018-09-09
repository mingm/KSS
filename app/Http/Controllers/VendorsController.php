<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\Http\Requests\VendorRequest;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('vendors.index', ['vendors' => Vendor::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$vendor = new Vendor();
		return view('vendors.form', ['vendorMethod' => 'POST', 'vendor' => $vendor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        //
		$vendor = Vendor::create($request->all());
		$vendor->save();
		
        return redirect()->action('VendorsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
		$vendor = Vendor::find($vendor->id);
		
		return view('vendors.form', ['vendorMethod' => 'PUT', 'vendor' => $vendor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
		$vendor = Vendor::find($vendor->id);
		
		return view('vendors.form', ['vendorMethod' => 'PUT', 'vendor' => $vendor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
		$vendor->name = $request->name;
		$vendor->details = $request->details;
		$vendor->phone = $request->phone;
		$vendor->save();
		
        return redirect()->action('VendorsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}

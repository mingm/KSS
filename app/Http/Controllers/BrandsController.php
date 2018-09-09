<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\BrandPost;
use Illuminate\Http\Request;

class BrandsController extends Controller
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
        return view('brands.index', ['brands' => Brand::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$brand = new Brand();
		return view('brands.form', ['brandMethod' => 'POST', 'brand' => $brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandPost $request)
    {
        //
		$brand = Brand::create($request->all());
		$brand->save();
		
        return redirect()->action('BrandsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
		$brand = Brand::find($brand->id);
		
		return view('brands.form', ['brandMethod' => 'PUT', 'brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
		$brand = Brand::find($brand->id);
		
        return view('brands.form', ['brandMethod' => 'PUT', 'brand' => $brand]);
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandPost $request, Brand $brand)
    {
        //
		$brand->name = $request->name;
		$brand->status = $request->status;
		$brand->save();
		
        return redirect()->action('BrandsController@index');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}

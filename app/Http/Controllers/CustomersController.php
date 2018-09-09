<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
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
		return view('customers.index', ['customers' => Customer::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$customer = new Customer();
		return view('customers.form', ['method' => 'POST', 'customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        //
		$user = Auth::user();
		
		$customer = new Customer;
		$customer->email = $request->email;
		$customer->first_name = $request->first_name;
		$customer->last_name = $request->last_name;
		$customer->phone = $request->phone;
		$customer->address = $request->address;
		$customer->note = $request->note;
		
		$customer->created_by = $user->first_name;
		$customer->updated_by = $user->first_name;
		
		$customer->save();
		
        return redirect()->action('CustomersController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
		$customer = Customer::find($customer->id);
		return view('customers.form', ['method' => 'PUT', 'customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
		$customer = Customer::find($customer->id);
		return view('customers.form', ['method' => 'PUT', 'customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        //
		$user = Auth::user();
		
		$customer->email = $request->email;
		$customer->first_name = $request->first_name;
		$customer->last_name = $request->last_name;
		$customer->address = $request->address;
		$customer->phone = $request->phone;
		$customer->note = $request->note;
		
		$customer->updated_by = $user->first_name;
		
		$customer->save();
		
        return redirect()->action('CustomersController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

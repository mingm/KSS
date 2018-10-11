<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClaimsWorkFlowController extends Controller
{
	private $SESSION_KEY = 'claim';
	
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
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
		Log::info('Step is '.$request->step);
        switch($request->step)
		{
			case '1':
			{
				$claim = $request->session()->get($this->SESSION_KEY);
				
				Log::info('First Name is '.$request->first_name);
				Log::info('Phone is '.$request->phone);
				
				DB::connection()->enableQueryLog();
				
				$query = DB::table('customers');
				
				if ($request->first_name) $query->where('first_name', 'like', '%' . $request->first_name . '%');

				if ($request->phone) $query->orWhere('phone', 'like', '%' . $request->phone . '%');

				$customers = $query->get();
				

				return view('claims.create.s1', ['claim' => $claim, 'customers' => $customers]);
			}
			case '2':
			{
				$claim = $request->session()->get($this->SESSION_KEY);
				$customerId = $request->customer;
				$customer = Customer::find($customerId);
				$claim->customer_id = $customer->id;
				
				Log::info('Claim Cuctomer id is '.$claim->customer_id);
				
				$request->session()->put($this->SESSION_KEY, $claim);				
				return view('claims.create.s2');
			}
			default:
			{
				$request->session()->forget($this->SESSION_KEY);
				$request->session()->put($this->SESSION_KEY, new Claim);				
				return view('claims.create.s1', ['claim' => new Claim]);
			}
		}
    }
	
	//private function 
}

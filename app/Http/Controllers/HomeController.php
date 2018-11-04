<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$query = DB::table('claims');
		$query->join('claims_product', 'claims.id', '=', 'claims_product.claim_id');
		$query->join('claims_product_action', function($join) {
				$join->on('claims_product_action.claim_id', '=', 'claims_product.claim_id');
				$join->on('claims_product_action.claim_product_id', '=', 'claims_product.id');
			});
		$query->join('products', 'products.id', '=', 'claims_product.product_id');
		$query->join('vendors', 'vendors.id', '=', 'products.vendor_id');
		$query->whereRaw('claims_product_action.id = (SELECT MAX(id) FROM claims_product_action scpa WHERE scpa.claim_id = claims_product.claim_id AND scpa.claim_product_id = claims_product.id)');
		$query->whereIn('claims_product_action.status', ['NEW']);
		$query->select('claims.claim_code, products.name, billsub.billsub_code, vendors.name, claims.created_at');

		$waitingTotal = $query->count();
		
		$query = DB::table('billsub');
		$query->join('billsub_product', 'billsub_product.billsub_id', '=', 'billsub.id');
		$query->join('claims_product', function($join) {
			$join->on('claims_product.id', '=', 'billsub_product.claim_product_id');
			$join->on('claims_product.claim_id', '=', 'billsub_product.claim_id');
		});
		$query->join('claims_product_action', function($join) {
			$join->on('claims_product_action.claim_id', '=', 'claims_product.claim_id');
			$join->on('claims_product_action.claim_product_id', '=', 'claims_product.id');
		});
		$query->join('products', 'products.id', '=', 'claims_product.product_id');
		$query->whereRaw('claims_product_action.id = (SELECT MAX(id) FROM claims_product_action scpa WHERE scpa.claim_id = claims_product.claim_id AND scpa.claim_product_id = claims_product.id)');
		$query->where('claims_product_action.status', '=', 'Transfer to dealer');
		$query->whereIn('billsub.status', ['In progress']);
		$query->select('claims.claim_code, products.name, billsub.billsub_code, vendors.name, claims.created_at');
		
		$waitingDealer = $query->count();
		
		$query = DB::table('claims_product');		
		$query->join('claims_product_action', function($join) {
			$join->on('claims_product_action.claim_id', '=', 'claims_product.claim_id');
			$join->on('claims_product_action.claim_product_id', '=', 'claims_product.id');
		});
		$query->whereRaw('claims_product_action.id = (SELECT MAX(id) FROM claims_product_action scpa WHERE scpa.claim_id = claims_product.claim_id AND scpa.claim_product_id = claims_product.id)');
		$query->where('claims_product_action.status', '=', 'Get back from dealer');
		
		$waitingReturn = $query->count();
		
        return view('home', ['waitingTotal' => $waitingTotal, 'waitingDealer' => $waitingDealer, 'waitingReturn' => $waitingReturn]);
    }
}

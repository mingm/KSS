<?php

namespace App\Http\Controllers;

use App\Billsub;
use App\BillsubProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillSubsController extends Controller
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
		return view('billSubs.index', ['billSubs' => BillSub::paginate(10)]);
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printBillSub($id)
    {
        $billSub = Billsub::find($id);
		
		$query = DB::table('billsub_product');
		$query->select('claims.claim_code as claim_code', 'claims_product.serial_number', 'claims_product.claim_detail', 'claims_product.specific_detail', 'claims_product.package_bundle', 'products.name as product_name');
		$query->join('claims_product', function($join) {
			$join->on('claims_product.claim_id', '=', 'billsub_product.claim_id');
			$join->on('claims_product.id', '=', 'billsub_product.claim_product_id');
		});
		$query->join('billsub', 'billsub.id', '=', 'billsub_product.billsub_id');
		$query->join('claims', 'claims.id', '=', 'billsub_product.claim_id');		
		$query->join('products', 'products.id', '=', 'claims_product.product_id');
		$query->where('billsub.id', '=', $billSub->id);
		$results = $query->get();
		
		return view('billSubs.print', ['billSub' => $billSub, 'results' => $results]);
    }
}

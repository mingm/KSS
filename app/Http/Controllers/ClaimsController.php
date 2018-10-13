<?php

namespace App\Http\Controllers;

use App\Claim;
use App\ClaimProduct;
use Illuminate\Http\Request;

class ClaimsController extends Controller
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
		return view('claims.index', ['claims' => Claim::paginate(10)]);
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printClaim($id)
    {
        $claim = Claim::find($id);
		$claimProductAll = ClaimProduct::where('claim_id', $claim->id)->get();
		
		return view('claims.print', ['claim' => $claim, 'claimProductAll' => $claimProductAll]);
    }
}

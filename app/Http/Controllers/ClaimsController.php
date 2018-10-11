<?php

namespace App\Http\Controllers;

use App\Claim;
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
}

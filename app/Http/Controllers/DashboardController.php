<?php

namespace App\Http\Controllers;

use App\BillSub;
use App\Claim;
use App\ClaimProduct;
use App\ClaimProductAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
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
	
	public function waiting()
	{
		$query = Claim::select();
		$query->whereIn('claims.status', ['NEW', 'In Progress']);
		
		$claims = $query->paginate(10);	
		
		return view('dashboard.waiting.index', ['claims' => $claims]);
	}
	
	public function getWaiting($id)
	{
		$claim = Claim::find($id);
		$claimProductAll = $claim->claimProducts;
				
		return view('dashboard.waiting.view', ['claim' => $claim, 'claimProductAll' => $claimProductAll]);
	}
	
	public function dealer()
	{
		$query = BillSub::select();
		$query->where('billsub.status', '=', 'In Progress');
		
		$billSubs = $query->paginate(10);	
		
		return view('dashboard.dealer.index', ['billSubs' => $billSubs]);
	}
	
	public function getDealer($id) {
		
		$billSub = BillSub::find($id);		
		
		return view('dashboard.dealer.form', ['billSub' => $billSub]);
	}
	
	public function moveToCustomer($id, Request $request) {
		$user = Auth::user();
		
		if (isset($request->updateList))
		{
			foreach ($request->updateList as $claimProductId) {
				
				$claimProduct = ClaimProduct::find($claimProductId);
				
				$claimProductAction = new ClaimProductAction;
				$claimProductAction->claim_id = $claimProduct->claim->id;
				$claimProductAction->claim_product_id = $claimProduct->id;
				$claimProductAction->status = 'Get back from dealer';
				$claimProductAction->created_by = $user->first_name;
				$claimProductAction->updated_by = $user->first_name;
				$claimProductAction->save();
				
			}	
		}
		
		$billSub = BillSub::find($id);
		
		if ($billSub->allReturned())
		{
			$billSub->status = 'Completed';
			$billSub->save();
		}
		
        return redirect()->action('DashboardController@dealer');
	}
	
	public function return()
	{
		$query = ClaimProduct::select();
		$query->join('claims_product_action', function($join) {
			$join->on('claims_product_action.claim_id', '=', 'claims_product.claim_id');
			$join->on('claims_product_action.claim_product_id', '=', 'claims_product.id');
		});
		$query->whereRaw('claims_product_action.id = (SELECT MAX(id) FROM claims_product_action scpa WHERE scpa.claim_id = claims_product.claim_id AND scpa.claim_product_id = claims_product.id)');
		$query->where('claims_product_action.status', '=', 'Get back from dealer');
		$query->select('claims_product.*');
		
		$claimProducts = $query->paginate(10);
				
		return view('dashboard.return.index', ['claimProducts' => $claimProducts]);
	}
	
	public function returned(Request $request) {
		$user = Auth::user();
		
		if (isset($request->updateList))
		{
			foreach ($request->updateList as $claimProductId) {
				
				$claimProduct = ClaimProduct::find($claimProductId);
				
				$claimProductAction = new ClaimProductAction;
				$claimProductAction->claim_id = $claimProduct->claim->id;
				$claimProductAction->claim_product_id = $claimProduct->id;
				$claimProductAction->status = 'returned';
				$claimProductAction->created_by = $user->first_name;
				$claimProductAction->updated_by = $user->first_name;
				$claimProductAction->save();
				
				$claim = Claim::find($claimProduct->claim->id);
				if ($claim->allReturned())
				{
					$claim->status = 'Completed';
					$claim->save();
				}
			}	
		}
				
		return redirect()->action('HomeController@index');
	}
}

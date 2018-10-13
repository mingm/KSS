<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Claim;
use App\ClaimProduct;
use App\ClaimProductAction;
use App\Customer;
use App\KSSNumber;
use App\Product;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClaimsWorkFlowController extends Controller
{
	private $SESSION_CLAIM_KEY = 'claim';
	private $SESSION_SELECTED_PRODUCT_KEY = 'claimProducts';
	private $CONS_CLAIM_NUMBER_KEY = 'CLAIM_NUMBER';
	
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
				Log::info('Step #1 - choose customer');
				$claim = $request->session()->get($this->SESSION_CLAIM_KEY);
				
				Log::info('First Name is '.$request->first_name);
				Log::info('Phone is '.$request->phone);
				
				$query = Customer::select();
				
				if ($request->first_name) $query->where('first_name', 'like', '%' . $request->first_name . '%');

				if ($request->phone) $query->orWhere('phone', 'like', '%' . $request->phone . '%');

				$customers = $query->paginate(10);
				
				return view('claims.form.s1', ['claim' => $claim, 'customers' => $customers]);
			}
			case '2':
			{
				Log::info('Step #2 - Claim detail');
				$claim = $request->session()->get($this->SESSION_CLAIM_KEY);
				$claimProductAll = $request->session()->get($this->SESSION_SELECTED_PRODUCT_KEY);
				
				if ($request->customer)
				{
					Log::info('Step #2 - With customer');
					$customerId = $request->customer;
					$customer = Customer::find($customerId);
					$claim->customer_id = $customer->id;
				}
				else
				{
					$customer = Customer::find($claim->customer_id);
				}
				
				if ($request->productId)
				{
					$product = Product::find($request->productId);
					
					$claimProduct = new ClaimProduct;
					$claimProduct->product_id = $product->id;
					$claimProduct->serial_number = $request->serialNumber;
					$claimProduct->claim_detail = $request->claimDetail;
					$claimProduct->specific_detail = $request->specificDetail;
					$claimProduct->package_bundle = $request->packageBundle;
					$claimProduct->note = $request->note;
					
					$claimProductAll[] = $claimProduct;
				}
				
				$request->session()->put($this->SESSION_CLAIM_KEY, $claim);
				$request->session()->put($this->SESSION_SELECTED_PRODUCT_KEY, $claimProductAll);		
				
				return view('claims.form.s2', ['customer' => $customer, 'claimProductAll' => $claimProductAll]);
			}
			case '3':
			{
				Log::info('Step #3 - choose product');
				$categories = Category::where('parent_id', 0)->get();
				$brands = Brand::all();
				$vendors = Vendor::all();
				
				$query = Product::select();
				
				if ($request->name) $query->where('name', 'like', '%' . $request->name . '%');
				if ($request->model) $query->where('model', 'like', '%' . $request->model . '%');
				if ($request->categoryId) $query->where('category_id', $request->categoryId);
				if ($request->brandId) $query->where('brand_id', $request->brandId);
				if ($request->vendorId) $query->where('vendor_id', $request->vendorId);
				
				$products = $query->paginate(10);
				
				return view('claims.form.s3', ['products' => $products, 'categories' =>  $categories, 'brands' => $brands, 'vendors' => $vendors]);
			}
			case '4':
			{
				Log::info('Step #4 - Claim product detail');
				
				$product = Product::find($request->productId);
				
				return view('claims.form.s4', ['product' => $product, 'claimProduct' => new ClaimProduct]);
			}
			case '5':
			{
				Log::info('Step #5 - Save claim');
				
				$user = Auth::user();
				
				$claim = $request->session()->get($this->SESSION_CLAIM_KEY);
				$claimProductAll = $request->session()->get($this->SESSION_SELECTED_PRODUCT_KEY);
				
				if (!isset($claim->claim_code)) {
					$claimNumber = KSSNumber::where('key', $this->CONS_CLAIM_NUMBER_KEY)->first();
					$claimNumber->number += 1;
					$claimNumber->save();
					$claim->claim_code = 'C' . str_pad($claimNumber->number, 9, "0", STR_PAD_LEFT);
					$claim->created_by = $user->first_name;
				}
				
				$claim->save();
				$claim->claimProducts()->saveMany($claimProductAll);
				
				foreach ($claim->claimProducts as $claimProduct)
				{
					if (count($claimProduct->claimProductActions) == 0)
					{
						$claimProductAction = new ClaimProductAction;
						$claimProductAction->claim_id = $claim->id;
						$claimProductAction->created_by = $user->first_name;
						$claimProductAction->updated_by = $user->first_name;
						
						$claimProductActions = array();
						$claimProductActions[] = $claimProductAction;
						
						$claimProduct->claimProductActions()->saveMany($claimProductActions);
					}
				}
				
				$request->session()->forget($this->SESSION_CLAIM_KEY);
				$request->session()->forget($this->SESSION_SELECTED_PRODUCT_KEY);
				
				return redirect()->action('ClaimsController@index');
			}
			default:
			{
				$request->session()->forget($this->SESSION_CLAIM_KEY);
				$request->session()->forget($this->SESSION_SELECTED_PRODUCT_KEY);
				
				if ($request->claimId)
				{
					$claim = Claim::find($request->claimId);
					$claimProductAll = $claim->claimProducts;
					
					$request->session()->put($this->SESSION_CLAIM_KEY, $claim);
					$request->session()->put($this->SESSION_SELECTED_PRODUCT_KEY, $claimProductAll);
					
					return view('claims.form.s2', ['customer' => $claim->customer, 'claimProductAll' => $claimProductAll]);
				}
				else
				{
					$request->session()->put($this->SESSION_CLAIM_KEY, new Claim);
					$request->session()->put($this->SESSION_SELECTED_PRODUCT_KEY, array());
					return view('claims.form.s1', ['claim' => new Claim]);
				}
				
			}
		}
    }
	
	//private function 
}

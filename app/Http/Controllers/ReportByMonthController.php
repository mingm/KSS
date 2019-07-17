<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportByMonthController extends Controller
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
		$dt = Carbon::now();
		$year = $dt->year - 3;
		
		$years = array();
		
		for ($i = 1; $i <= 5; $i++) {
			array_push($years, $year + $i);
		}
		
		return view('reports.report_month', ['years' => $years]);
    }
	
	public function search(Request $request) {
		
		
		Log::info("report id: ". $request->report_id);
		Log::info("month id: ". $request->month_id);
		Log::info("year id: ". $request->year_id);
		switch($request->report_id)
		{
			case '1':
			{
				$query = DB::table('claims');
				$query->select('products.name', 'products.model', DB::raw('count(*) as total'));
				$query->join('claims_product', 'claims_product.claim_id', '=', 'claims.id');
				$query->join('products', 'products.id', '=', 'claims_product.product_id');
				$query->whereRaw('MONTH(claims.created_at) = ?', [$request->month_id]);
				$query->whereRaw('YEAR(claims.created_at) = ?', [$request->year_id]);
				$query->groupBy('products.name', 'products.model');
				$query->orderBy('total', 'DESC');
				$results = $query->paginate(10);
				
				return view('reports.report_month_result', ['results' => $results]);
			}
			default:
			{
				return redirect()->action('ReportByMonthController@index');
			}
		}
	}
	
	public function reportMonthYear()
    {
        //
		$dt = Carbon::now();
		$year = $dt->year - 3;
		
		$years = array();
		
		for ($i = 1; $i <= 5; $i++) {
			array_push($years, $year + $i);
		}
		
		return view('reports.report_year', ['years' => $years]);
    }
	
	public function reportMonthYearSearch(Request $request) {
		
		Log::info("year id: ". $request->year_id);
		
		$query = DB::table('claims');
		$query->select(DB::raw('MONTH(claims.created_at) as month, COUNT(*) as total'));
		$query->join('claims_product', 'claims_product.claim_id', '=', 'claims.id');
		$query->whereRaw('YEAR(claims.created_at) = ?', [$request->year_id]);
		$query->groupBy(DB::raw('MONTH(claims.created_at)'));
		$results = $query->get()->toArray();
		
		$monthlyData = array();
		
		for ($month = 1; $month <= 12; $month++) {
			
			$key = array_search($month, array_column($results, 'month'));
			$monthObj = new \stdClass();
			$monthObj->Month = ReportByMonthController::getMonthName($month);
			
			if ($key > -1) {
				
				$monthObj->Total = $results[$key]->total;
				array_push($monthlyData, $monthObj);
			} else {
				
				$monthObj->Total = 0;
				array_push($monthlyData, $monthObj);
			}
		} 
		
		$chartData = json_encode($monthlyData);
		
		return view('reports.report_year_result', ['chartData' => $chartData]);
		
	}
	
	private function getMonthName($month) {
		switch($month)
		{
			case '1':
			{
				return 'มค';
			}
			case '2':
			{
				return 'กพ';
			}
			case '3':
			{
				return 'มีค';
			}
			case '4':
			{
				return 'เมษ';
			}
			case '5':
			{
				return 'พค';
			}
			case '6':
			{
				return 'มิย';
			}
			case '7':
			{
				return 'กค';
			}
			case '8':
			{
				return 'สค';
			}
			case '9':
			{
				return 'กย';
			}
			case '10':
			{
				return 'ตค';
			}
			case '11':
			{
				return 'พย';
			}
			case '12':
			{
				return 'ธค';
			}
			default:
			{
				return $month;
			}
		}
	}
	
}

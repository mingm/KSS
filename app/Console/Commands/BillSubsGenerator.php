<?php

namespace App\Console\Commands;

use App\ClaimProductAction;
use App\BillSub;
use App\BillsubProduct;
use App\KSSNumber;
use App\Vendor;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BillSubsGenerator extends Command
{
	
	private $CONS_BILLSUB_NUMBER_KEY = 'BILLSUB_NUMBER';
	
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:BillSubs {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bill Sub Generator';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
		Log::info('Bill Sub Generator');
		$vendorId = $this->option('id');
		Log::info('Vendor id: '. $vendorId);
		
		$query = Vendor::select();
		
		if ($vendorId) $query->where('id', '=', $vendorId);
		
		$vendors = $query->get();
		
		foreach($vendors as $vendor)
		{	
			$query = DB::table('claims_product');
			$query->join('claims', 'claims.id', '=', 'claims_product.claim_id');
			$query->join('claims_product_action', function($join) {
				$join->on('claims_product_action.claim_id', '=', 'claims_product.claim_id');
				$join->on('claims_product_action.claim_product_id', '=', 'claims_product.id');
			});
			$query->join('products', 'claims_product.product_id', '=', 'products.id');
			$query->join('vendors', 'products.vendor_id', '=', 'vendors.id');
			$query->where('claims.created_at', '>=', $vendor->lastGenerateBillSub);
			$query->where('claims.status', '=', 'NEW');
			$query->where('claims_product_action.status', '=', 'NEW');
			$query->where('vendors.id', '=', $vendor->id);
			$query->select('claims.id as claim_id', 'claims_product.serial_number', 'products.id as product_id', 'claims_product.id AS claims_product_id', 'claims_product_action.id as claims_product_action_id');
			$results = $query->get();			
			
			$billSubProductAll = array();
			
			foreach ($results as $result)
			{				
				$billSubProduct = new BillsubProduct;
				$billSubProduct->claim_id = $result->claim_id;
				$billSubProduct->claim_product_id = $result->claims_product_id;
				
				$billSubProductAll[] = $billSubProduct;
				
				$claimProductAction = new ClaimProductAction;
				$claimProductAction->claim_id = $result->claim_id;
				$claimProductAction->claim_product_id = $result->claims_product_id;
				$claimProductAction->status = 'Transfer to dealer';
				$claimProductAction->created_by = 'SYSTEM';
				$claimProductAction->updated_by = 'SYSTEM';
				$claimProductAction->save();
				
			}
			if (count($billSubProductAll) > 0)
			{
				$claimNumber = KSSNumber::where('key', $this->CONS_BILLSUB_NUMBER_KEY)->first();
				$claimNumber->increment('number', 1);
				$billsubCode = 'SD' . str_pad($claimNumber->number, 8, "0", STR_PAD_LEFT);
			
				$billSub = new BillSub;
				$billSub->billsub_code = $billsubCode;
				$billSub->vendor_id = $vendor->id;
				$billSub->created_by = 'SYSTEM';
				$billSub->updated_by = 'SYSTEM';
				
				$billSub->save();
				$billSub->billsubProducts()->saveMany($billSubProductAll);
				
				$vendor->lastGenerateBillSub = Carbon::now()->format('Y-m-d');
				$vendor->save();
			}
		}
    }
}

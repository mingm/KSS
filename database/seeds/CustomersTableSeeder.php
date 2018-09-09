<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('customers')->insert([
		
			['email' => 'moomo@gmail.com',
			'first_name' => 'ศุภกฤต',
			'last_name' => 'มณีรัตน์',
			'address' => '52/102',
			'phone' => '089-009-4400',
			'note' => '',
			'created_by' => 'dump_data',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_by' => 'dump_data',
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['email' => 'kss046@gmail.com',
			'first_name' => 'สาขา FB046',
			'last_name' => 'KSS INTERTECH GROUP',
			'address' => '99 หมู่ ชั้น 4 ห้อง FB046-050 ถ.พหลโยธิน ต.คูคต อ.ลำลูกกา จ.ปทุมธานี 12130',
			'phone' => '089-009-4400',
			'note' => '',
			'created_by' => 'dump_data',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_by' => 'dump_data',
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['email' => 'kss039@gmail.com',
			'first_name' => 'สาขา FB039',
			'last_name' => 'KSS INTERTECH GROUP',
			'address' => '99 หมู่ ชั้น 3 ห้อง TB-039 ถ.พหลโยธิน ต.คูคต อ.ลำลูกกา จ.ปทุมธานี 12130',
			'phone' => '089-009-4400',
			'note' => '',
			'created_by' => 'dump_data',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_by' => 'dump_data',
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
		]);
    }
}

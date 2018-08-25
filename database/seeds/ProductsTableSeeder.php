<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$vstarcam_brand = App\Brand::where('name', 'VStarcam')->first();
		$pendoo_brand = App\Brand::where('name', 'Pendoo')->first();
		$doss_brand = App\Brand::where('name', 'Doss')->first();
		$genius_brand = App\Brand::where('name', 'Genius')->first();
		$micropack_brand = App\Brand::where('name', 'Micropack')->first();
		$anitech_brand = App\Brand::where('name', 'Anitech')->first();
		$macnus_brand = App\Brand::where('name', 'Macnus')->first();
		$razer_brand = App\Brand::where('name', 'Razer')->first();
		$steelseries_brand = App\Brand::where('name', 'Steelseries')->first();
		$awei_brand = App\Brand::where('name', 'Awei')->first();
		$logitech_brand = App\Brand::where('name', 'Logitech')->first();
		$tenda_brand = App\Brand::where('name', 'Tenda')->first();
		$dlink_brand = App\Brand::where('name', 'D-LINK')->first();
		
		
		$newworld_vendor = App\Vendor::where('phone', '02-392-4300')->first();
		$welltech_vendor = App\Vendor::where('phone', '083-420-3334')->first();
		$smartID_vendor = App\Vendor::where('phone', '086-319-5453')->first();
		$spa_vendor = App\Vendor::where('phone', '02-320-3000')->first();
		$ascenti_vendor = App\Vendor::where('phone', '087-557-0588')->first();
		$trandy_vendor = App\Vendor::where('phone', '088-227-9474')->first();
		$chininter_vendor = App\Vendor::where('phone', '02-314-4142-144')->first();
		$synnex_vendor = App\Vendor::where('phone', '1251')->first();
		$tentao_vendor = App\Vendor::where('phone', '083-008-6640')->first();
		$digiland_vendor = App\Vendor::where('phone', '02-642-8700')->first();
		
		$ipcamera_cat = App\Category::where('name', 'IP Camera')->first();
		$speaker_cat = App\Category::where('name', 'Speaker')->first();
		$wifi_cat = App\Category::where('name', 'WIFI')->first();
		$mouse_cat = App\Category::where('name', 'Mouse')->first();
		$keyboard_cat = App\Category::where('name', 'Keyboard')->first();
		$cable_cat = App\Category::where('name', 'Cable')->first();
		$androidbox_cat = App\Category::where('name', 'Android Box')->first();
		
		$adminuser = App\User::where('email', 'admin@gmail.com')->first();
		
		DB::table('products')->insert([
		
			['brand_id' => $vstarcam_brand->id,
			'vendor_id' => $newworld_vendor->id,
			'category_id' => $ipcamera_cat->id,
			'name' => 'VStarcam C38S 1080p IP Camera',
			'model' => 'C38S',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $vstarcam_brand->id,
			'vendor_id' => $newworld_vendor->id,
			'category_id' => $ipcamera_cat->id,
			'name' => 'C7824WIP Wireless Network Camera',
			'model' => 'C7824WIP',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $vstarcam_brand->id,
			'vendor_id' => $newworld_vendor->id,
			'category_id' => $ipcamera_cat->id,
			'name' => 'VStarcam C24S Home IP Camera',
			'model' => 'C24S',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $vstarcam_brand->id,
			'vendor_id' => $newworld_vendor->id,
			'category_id' => $ipcamera_cat->id,
			'name' => 'VStarcam C7837WIP Home monitoring IP',
			'model' => 'C7837WIP',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $pendoo_brand->id,
			'vendor_id' => $newworld_vendor->id,
			'category_id' => $androidbox_cat->id,
			'name' => 'Pendoo x5 pro rk3229',
			'model' => 'X5PRO',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $doss_brand->id,
			'vendor_id' => $newworld_vendor->id,
			'category_id' => $speaker_cat->id,
			'name' => 'SPK Bluetooth DOSS DS 1771',
			'model' => 'DS1771',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
			
		]);
		
		DB::table('products')->insert([
		
			['brand_id' => $genius_brand->id,
			'vendor_id' => $welltech_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'DX-130 (USB)',
			'model' => 'DX-130',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $genius_brand->id,
			'vendor_id' => $welltech_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Media Pointer 100',
			'model' => 'Media Pointer 100',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $genius_brand->id,
			'vendor_id' => $welltech_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Tablet EasyPen i405X',
			'model' => 'i405X',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $genius_brand->id,
			'vendor_id' => $welltech_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Tablet MousePen i608X',
			'model' => 'i608X',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $micropack_brand->id,
			'vendor_id' => $welltech_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Rainbow Optical Mouse MP-216',
			'model' => 'MP-216',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $micropack_brand->id,
			'vendor_id' => $welltech_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'RF 2.4G Wireless Mouse',
			'model' => 'MP-776W',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

		]);
		
		DB::table('products')->insert([
		
			['brand_id' => $anitech_brand->id,
			'vendor_id' => $smartID_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Numerate N180',
			'model' => 'N180',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $anitech_brand->id,
			'vendor_id' => $smartID_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Wired Mouse',
			'model' => 'A101',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $anitech_brand->id,
			'vendor_id' => $smartID_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Tanku Gaming',
			'model' => 'A538',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $anitech_brand->id,
			'vendor_id' => $smartID_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Macro Avago Gaming Mouse',
			'model' => 'GM701',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
		]);
		
		DB::table('products')->insert([
		
			['brand_id' => $macnus_brand->id,
			'vendor_id' => $spa_vendor->id,
			'category_id' => $cable_cat->id,
			'name' => 'High Speed HDMI Cable with Ethernet 5601',
			'model' => '5601-1B-05 (3M)',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $macnus_brand->id,
			'vendor_id' => $spa_vendor->id,
			'category_id' => $cable_cat->id,
			'name' => 'High Speed HDMI Cable with Ethernet 6001',
			'model' => '6001-1B-06 (5M)',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $macnus_brand->id,
			'vendor_id' => $spa_vendor->id,
			'category_id' => $cable_cat->id,
			'name' => 'High Speed HDMI Cable with Ethernet 5002',
			'model' => '5002-3DA-01 (1.8M)',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $macnus_brand->id,
			'vendor_id' => $spa_vendor->id,
			'category_id' => $cable_cat->id,
			'name' => 'High Speed HDMI Cable with Ethernet 5003',
			'model' => '5003-6DA (2M)',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

		]);
		
		
		DB::table('products')->insert([
		
			['brand_id' => $razer_brand->id,
			'vendor_id' => $ascenti_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Razer Lancehead Wireless Supremacy',
			'model' => 'razer-lancehead',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $razer_brand->id,
			'vendor_id' => $ascenti_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'D.Va Razer Abyssus Elite',
			'model' => 'D.Va Razer Abyssus Elite',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $razer_brand->id,
			'vendor_id' => $ascenti_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Razer Abyssus Essential',
			'model' => 'Razer Abyssus Essential',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $razer_brand->id,
			'vendor_id' => $ascenti_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Razer deathstalker essential',
			'model' => 'Deathstalker essential',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $steelseries_brand->id,
			'vendor_id' => $ascenti_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'ARCTIS Slate Gray',
			'model' => 'arctis 3',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $steelseries_brand->id,
			'vendor_id' => $ascenti_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'Rival 1100',
			'model' => 'Rival 1100',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
		]);
		
		DB::table('products')->insert([
		
			['brand_id' => $awei_brand->id,
			'vendor_id' => $trandy_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'True Wireless Earbuds with Charging T3',
			'model' => 'T3',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $awei_brand->id,
			'vendor_id' => $trandy_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'True Wireless Earbuds with Charging T5',
			'model' => 'T5',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $awei_brand->id,
			'vendor_id' => $trandy_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'True Wireless Earbuds with Charging T8',
			'model' => 'T8',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
		]);
		
		DB::table('products')->insert([
		
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $chininter_vendor->id,
			'category_id' => $keyboard_cat->id,
			'name' => 'WIRELESS COMBO MK520R',
			'model' => 'MK520R',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $chininter_vendor->id,
			'category_id' => $keyboard_cat->id,
			'name' => 'MK240 NANO',
			'model' => 'MK240',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $chininter_vendor->id,
			'category_id' => $keyboard_cat->id,
			'name' => 'WIRELESS COMBO MK220',
			'model' => 'MK220',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $chininter_vendor->id,
			'category_id' => $ipcamera_cat->id,
			'name' => 'C922 PRO STREAM WEBCAM',
			'model' => 'C922',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

		]);
		
		DB::table('products')->insert([
		
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $synnex_vendor->id,
			'category_id' => $keyboard_cat->id,
			'name' => 'WIRELESS COMBO MK520R',
			'model' => 'MK520R',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $synnex_vendor->id,
			'category_id' => $keyboard_cat->id,
			'name' => 'MK240 NANO',
			'model' => 'MK240',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $synnex_vendor->id,
			'category_id' => $keyboard_cat->id,
			'name' => 'WIRELESS COMBO MK220',
			'model' => 'MK220',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $synnex_vendor->id,
			'category_id' => $ipcamera_cat->id,
			'name' => 'C922 PRO STREAM WEBCAM',
			'model' => 'C922',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $synnex_vendor->id,
			'category_id' => $speaker_cat->id,
			'name' => 'X50 MOBILE WIRELESS SPEAKER',
			'model' => 'X50',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $logitech_brand->id,
			'vendor_id' => $synnex_vendor->id,
			'category_id' => $mouse_cat->id,
			'name' => 'BLUETOOTH MOUSE M557',
			'model' => 'M557',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

		]);
		
		DB::table('products')->insert([
		
			['brand_id' => $tenda_brand->id,
			'vendor_id' => $tentao_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'AC1200 Whole Home Mesh WiFi System',
			'model' => 'MW3',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $tenda_brand->id,
			'vendor_id' => $tentao_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'AC1200 Smart Dual-Band Wireless Router',
			'model' => 'AC6',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

		]);
		
		DB::table('products')->insert([
		
			['brand_id' => $dlink_brand->id,
			'vendor_id' => $digiland_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'AC3200 Wireless Tri-Band Gigabit Router',
			'model' => 'DIR-890L',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $dlink_brand->id,
			'vendor_id' => $digiland_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'AC3150 MU-MIMO Ultra Wi Fi Router',
			'model' => 'DIR-885L',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $dlink_brand->id,
			'vendor_id' => $digiland_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'HD Wi-Fi Camera',
			'model' => 'DCS-936L',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
			
			['brand_id' => $dlink_brand->id,
			'vendor_id' => $digiland_vendor->id,
			'category_id' => $wifi_cat->id,
			'name' => 'Wireless AC1200 Mimo Wi Fi Gigabit',
			'model' => 'DIR-842',
			'created_by' => $adminuser->first_name,
			'updated_by' => $adminuser->first_name,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

		]);
    }
}

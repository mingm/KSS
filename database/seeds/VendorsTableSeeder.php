<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
			['name' => 'นิวเวิล์ด ดิสทริบิวชั่น จำกัด', 'details' => '', 'phone' => '02-392-4300', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'เวลเทคกรุ๊ป จำกัด', 'details' => '13/27,13/28หมู่ 9 ถนนเกษตร-นวมินทร์ แขวงคลองกุ่ม เขตบึงกุ่ม ถ.อำนวยสงคราม เขตดุสิต กทม', 'phone' => '083-420-3334', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'สมาร์ท ไอดี กรุ๊ป จำกัด', 'details' => '', 'phone' => '086-319-5453', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'สปา ออฟฟิต ซัพพลายส์ จำกัด', 'details' => '', 'phone' => '02-320-3000', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'เอสเซนตี้ รีซอร์สเซส จำกัด (สำนักงานใหญ่)', 'details' => '', 'phone' => '087-557-0588', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'เทรนดี้ ไอที จำกัด', 'details' => '832 ซอย บางนา-ตราด 27 ถนน บางนา-ตราด บางนา กรุงเทพมหานคร 10260', 'phone' => '088-227-9474', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'บันเลือง ชินอินเตอร์ จำกัด', 'details' => '84/1,86/1 ซ.ปรียานุช ถ.พระราม 9 แขวงห้วยขวา 10400', 'phone' => '02-314-4142-144', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'ซินเน็ค(ประเทศไทย)จำกัด(มหาชน)', 'details' => '433 ถ.สุคนธสวัสดิ์ แขวงลาดพร้าว เขตลาดพร้าว 10230', 'phone' => '1251', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'เทิ่นต๋า เทคโนโลยี(ไทยแลนด์) จำกัด Tenda', 'details' => '184/82 อาคารฟอรั่ม ทาวเวอร์ ชั้นที่ 17 ถนนรัชดาภิเษก แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพมหานคร 10310', 'phone' => '083-008-6640', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')],
			['name' => 'ดิจิแลนด์ (ประเทศไทย)จำกัด', 'details' => 'เลขที่ 731 อาคารพี เอ็ม ทาวเวอร์ ชั้น11 ถ.อโศก-ดินแดง แขวงดินแดง 10400', 'phone' => '02-642-8700', 'lastGenerateBillSub' => Carbon::now()->format('Y-m-d')]
        ]);		
    }	
}

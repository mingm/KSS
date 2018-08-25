<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('categories')->insert([
			['name' => 'CCTV & Security', 'level' => '1'],
			['name' => 'Gadget', 'level' => '1'],
			['name' => 'Network', 'level' => '1'],
			['name' => 'Accessories', 'level' => '1']
        ]);		
		
		$cctv_cat = App\Category::where('name', 'CCTV & Security')->first();
		$gadget_cat = App\Category::where('name', 'Gadget')->first();
		$network_cat = App\Category::where('name', 'Network')->first();
		$accessories_cat = App\Category::where('name', 'Accessories')->first();

		DB::table('categories')->insert([
			['name' => 'IP Camera', 'level' => '2', 'parent_id' => $cctv_cat->id]
        ]);
		
		DB::table('categories')->insert([
			['name' => 'Android Box', 'level' => '2', 'parent_id' => $gadget_cat->id],
			['name' => 'Speaker', 'level' => '2', 'parent_id' => $gadget_cat->id]
        ]);
		
		DB::table('categories')->insert([
			['name' => 'WIFI', 'level' => '2', 'parent_id' => $network_cat->id]
        ]);
		
		DB::table('categories')->insert([
			['name' => 'Mouse', 'level' => '2', 'parent_id' => $accessories_cat->id],
			['name' => 'Keyboard', 'level' => '2', 'parent_id' => $accessories_cat->id],
			['name' => 'Cable', 'level' => '2', 'parent_id' => $accessories_cat->id]
        ]);
    }
}

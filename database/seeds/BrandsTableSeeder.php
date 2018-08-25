<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
			['name' => 'VStarcam'],
			['name' => 'Pendoo'],
			['name' => 'Doss'],
			['name' => 'Genius'],
			['name' => 'Micropack'],
			['name' => 'Anitech'],
			['name' => 'Macnus'],
			['name' => 'Razer'],
			['name' => 'Steelseries'],
			['name' => 'Awei'],
			['name' => 'Logitech'],
			['name' => 'Tenda'],
			['name' => 'D-LINK']
        ]);		
    }
}

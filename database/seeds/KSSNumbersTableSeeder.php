<?php

use Illuminate\Database\Seeder;

class KSSNumbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kss_numbers')->insert([
			['key' => 'CLAIM_NUMBER', 'number' => 1],
			['key' => 'BILLSUB_NUMBER', 'number' => 1]
        ]);		
    }
}

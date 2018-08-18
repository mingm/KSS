<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'role_code' => 'ADMIN'
        ]);
		DB::table('roles')->insert([
            'role_name' => 'Claim Team',
            'role_code' => 'CLAIM_TEAM'
        ]);
		DB::table('roles')->insert([
            'role_name' => 'Bill Team',
            'role_code' => 'BILL_TEAM'
        ]);
		DB::table('roles')->insert([
            'role_name' => 'Manager',
            'role_code' => 'MANAGER'
        ]);
    }
}

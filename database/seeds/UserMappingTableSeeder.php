<?php

use Illuminate\Database\Seeder;

class UserMappingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$admin_role = App\Role::where('role_code', 'ADMIN')->first();
		$claim_role = App\Role::where('role_code', 'CLAIM_TEAM')->first();
		$bill_role = App\Role::where('role_code', 'BILL_TEAM')->first();
		$manager_role = App\Role::where('role_code', 'MANAGER')->first();
							
		$admin_user = App\User::where('email', 'admin@gmail.com')->first();
		$claim_user = App\User::where('email', 'claim@gmail.com')->first();
		$bill_user = App\User::where('email', 'bill@gmail.com')->first();
		$manager_user = App\User::where('email', 'manager@gmail.com')->first();
							
		$admin_user->roles()->save($admin_role);
		$claim_user->roles()->save($claim_role);
		$bill_user->roles()->save($bill_role);
		$manager_user->roles()->save($manager_role);
		$manager_user->roles()->save($claim_role);
		$manager_user->roles()->save($bill_role);
		
    }
}

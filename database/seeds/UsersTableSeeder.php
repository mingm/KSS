<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			'emp_id' => '900001',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'first_name' => 'admin',
            'last_name' => 'admin',
            'created_by' => 'data_dump',
            'updated_by' => 'data_dump',
        ]);
        DB::table('users')->insert([
			'emp_id' => '200001',
            'email' => 'claim@gmail.com',
            'password' => bcrypt('password'),
            'first_name' => 'claim',
            'last_name' => 'claim',
            'created_by' => 'data_dump',
            'updated_by' => 'data_dump',
        ]);
        DB::table('users')->insert([
			'emp_id' => '300001',
            'email' => 'bill@gmail.com',
            'password' => bcrypt('password'),
            'first_name' => 'bill',
            'last_name' => 'bill',
            'created_by' => 'data_dump',
            'updated_by' => 'data_dump',
        ]);
        DB::table('users')->insert([
			'emp_id' => '800001',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('password'),
            'first_name' => 'manager',
            'last_name' => 'manager',
            'created_by' => 'data_dump',
            'updated_by' => 'data_dump',
        ]);
		
    }
}

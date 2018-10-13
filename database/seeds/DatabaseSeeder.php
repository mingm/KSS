<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
		$this->call(RolesTableSeeder::class);
		$this->call(UserMappingTableSeeder::class);
		$this->call(BrandsTableSeeder::class);
		$this->call(VendorsTableSeeder::class);
		$this->call(CategoriesTableSeeder::class);
		$this->call(ProductsTableSeeder::class);
		$this->call(CustomersTableSeeder::class);
		$this->call(KSSNumbersTableSeeder::class);
    }
}

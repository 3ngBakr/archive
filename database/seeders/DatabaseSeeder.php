<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
	public function run(): void
	{
		$this->call([
			             UsersTableSeeder::class,
			             RolesTableSeeder::class,
			             UsersRoleSeeder::class,
			             PermissionsTableSeeder::class,
			        //   DocumentSeeder::class,
			        //   ServiceManagementSeeder::class,
			        //   BlogSeeder::class,
			             PartnerSeeder::class,
					    	BageSeeder::class,
						SocialSeeder::class,
		            ]);

		Cache::flush();
	}
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
	public function run(): void
	{
		$roles = [
			[
				'name'       => 'super-admin',
				'guard_name' => 'web',
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'name'       => 'admin',
				'guard_name' => 'web',
				'created_at' => now(),
				'updated_at' => now(),
			],
		];

		Role::insert($roles);
	}
}

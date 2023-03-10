<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
	public function run(): void
	{
		$users = [
			array(
				'name'              => 'Super Admin',
				'email'             => 'admin@admin.com',
				'email_verified_at' => now(),
				'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
				'remember_token'    => Str::random(10),
			),
		];

		User::insert($users);
		User::factory()->count(9)->create();
	}
}

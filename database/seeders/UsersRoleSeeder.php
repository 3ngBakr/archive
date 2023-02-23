<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersRoleSeeder extends Seeder
{
	public function run(): void
	{
		$userModel = 'App\Models\User';

		$users_roles = [
			array(
				'role_id'    => 1,
				'model_type' => $userModel,
				'model_id'   => 1,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 2,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 3,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 4,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 5,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 6,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 7,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 8,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 9,
			),
			array(
				'role_id'    => 2,
				'model_type' => $userModel,
				'model_id'   => 10,
			),
		];

		DB::table(config('permission.table_names.model_has_roles', 'model_has_roles'))->insert($users_roles);
	}
}

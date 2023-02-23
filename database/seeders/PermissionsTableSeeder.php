<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
	public function run(): void
	{
		$models            = config('ryada.models', []);
		$model_permissions = config('ryada.model_permissions', []);
		$all_permissions   = [];

		foreach ($models as $model) {
			foreach ($model_permissions as $permission) {
				$all_permissions[] = [
					'name'       => "{$permission} {$model['model']}",
					'group'      => "{$model['model']}",
					'tab'        => "{$model['tab']}",
					'guard_name' => "web",
					'created_at' => now(),
					'updated_at' => now(),
				];
			}
		}

		Permission::insert($all_permissions);

		$getName = function (array $element) {
			return $element['name'];
		};

		$role = Role::where('name', 'Super-Admin')->get()->first();
		$role->permissions();
		$role->syncPermissions(array_map($getName, $all_permissions));
	}
}

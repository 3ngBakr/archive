<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Roles\StoreRoleRequest;
use App\Http\Requests\BackEnd\Roles\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Yajra\DataTables\EloquentDataTable;

class RoleController extends BackEndController
{
	public function __construct(Role $model = null) { parent::__construct($model); }

	protected function append()
	: array
	{
		return ['permissions' => Permission::all(['id', 'name'])->pluck('name', 'id')];
	}

	protected function dataTables(EloquentDataTable &$table)
	: void
	{
		$table->editColumn('name', function ($row) {
			return $row->name ? $row->name : "";
		});

		parent::dataTables($table);
	}

	public function store(StoreRoleRequest $request)
	: \Illuminate\Http\RedirectResponse
	{
		$role = Role::create($request->validated());
		$role->permissions()->sync($request->input('permissions', []));

		return redirect()->route('admin.roles.index');
	}

	public function update(UpdateRoleRequest $request, Role $role)
	: \Illuminate\Http\RedirectResponse
	{
		$role->update($request->validated());
		$role->permissions()->sync($request->input('permissions', []));

		return redirect()->route('admin.roles.index');
	}
}

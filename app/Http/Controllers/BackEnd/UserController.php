<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\StoreUserRequest;
use App\Http\Requests\BackEnd\Users\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\EloquentDataTable;

class UserController extends BackEndController
{
	public function __construct(User $model = null) { parent::__construct($model); }

	protected function relationships(): array
	{
		return ['roles'];
	}

	protected function append(): array
	{
		return ['roles' => Role::all(['id', 'name'])->pluck('name', 'id')];
	}

	protected function views(): array
	{
		return ['index' => true];
	}

	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->editColumn('name', function ($row) {
			return $row->name ? $row->name : "";
		});
		$table->editColumn('email', function ($row) {
			return $row->email ? $row->email : "";
		});

		$table->editColumn('roles', function ($row) {
			$labels = [];

			foreach ($row->roles as $role) {
				$labels[] = sprintf('<span class="badge rounded-pill bg-info text-dark">%s</span>', $role->name);
			}

			return implode(' ', $labels);
		});

		$this->rawColumns[] = 'roles';
		parent::dataTables($table);
	}

	public function store(StoreUserRequest $request): \Illuminate\Http\RedirectResponse
	{
		$user = User::create($request->validated());
		$user->roles()->sync($request->input('roles', []));

		return redirect()->route('admin.users.index');
	}

	public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\RedirectResponse
	{
		$user->update($request->validated());
		$user->roles()->sync($request->input('roles', []));

		return redirect()->route('admin.users.index');
	}
}

<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Permissions\StorePermissionRequest;
use App\Models\Permission;
use App\Models\Role;;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Spatie\Permission\Models\Role;

class PermissionController extends BackEndController
{
	public function __construct(Permission $model = null) { parent::__construct($model); }

	protected function relationships()
	: array
	{
		return ['roles'];
	}

	protected function append()
	: array
	{
		return ['roles' => Role::all(['id', 'name'])->pluck('name', 'id')];
	}

	protected function views()
	: array
	{
		return ['index' => true];
	}

	public function index(Request $request)
	{
		abort_unless(\Auth::user()->can("index {$this->modelName}"), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$modelName = $this->modelName;

		$tabs         = '';
		$tabs_content = '';
		$permissions  = Permission::with(['roles:name'])->get()->groupBy(['tab', 'group']);

		$roles = Role::with('permissions')->get();
//		dump($roles);
//		dd($permissions);
		return view("back-end.permissions.index", compact('permissions', 'roles', 'modelName'));
	}

	public function store(StorePermissionRequest $request)
	: \Illuminate\Http\RedirectResponse
	{
		// $request->dd();
		// $permission = Permission::create($request->validated());
		// $permission->permissions()->sync($request->input('permissions', []));

		// return redirect()->route('admin.permissions.index');
		$requestArray = $request->all();
        //dd($requestArray);
        foreach ($requestArray as $key => $request) {
            if ($key == "_token")
                continue;

            if ($key == "group"){
                $permissions = $this->model->where('group', $request)->get();
                //dd($permissions);
                continue;
            }
            $role = Role::where('name', $key)->get()->first();
            //dd();
            $role->permissions();
            $role->syncPermissions($request);
        }

        return redirect()->back()->with('status', 'تم حفظ التغييرات');

		
	}
}

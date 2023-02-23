<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Bages\StoreBage;
use App\Http\Requests\BackEnd\Bages\UpdateBage;
use App\Models\Bage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;

class BageController extends BackEndController
{
	public function __construct(Bage $model = null) 
	{ 
		parent::__construct($model); 
		$this->setDatatableActions(['delete' => false]);
	}
	protected function views(): array
	{
		return ['index' => true];
	}

	

	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->editColumn('name', function ($row) {
			return $row->name ?: "";
		});
		$table->editColumn('description', function ($row) {
			return $row->description ?: "";
		});
		$table->editColumn('vision', function ($row) {
			return $row->vision ?: "";
		});
		$table->editColumn('message', function ($row) {
			return $row->message ?: "";
		});
		$table->editColumn('objective', function ($row) {
			return $row->objective ?: "";
		});
		parent::dataTables($table);
	}

	public function store(StoreBage $request)
	{
		$bage = Bage::create($bage->validated());
	//	$bage->addLogoFromRequest();

		Cache::delete('bages');

		return redirect()->route('admin.bages.index');
	}

	public function update(UpdateBage $request, Bage $bage)
	{
		$bage->update($request->validated());

		Cache::delete('bages');

		return redirect()->route('admin.bages.index');
	}

	public function destroy($id)
	{
		/*Cache::delete('bages');

		return parent::destroy($id);*/
	}
}

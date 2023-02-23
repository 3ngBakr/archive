<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use App\Http\Requests\BackEnd\Mains\StoreMain;
use App\Http\Requests\BackEnd\Mains\UpdateMain;
use App\Models\Main;


class MainController extends BackEndController
{
	public function __construct(Main $model = null)
	{
		parent::__construct($model);
		$this->setDatatableActions(['create' => true, 'show' => true, 'edit' => true, 'reply' => false, 'index' => true]);
	}
	protected function views(): array
	{
		return ['index' => true];
	}
	//
	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->addColumn('image', '&nbsp;');
		
		$table->editColumn('name', function ($row) {
			return $row->name ?: "";
		});

		$table->editColumn('description', function ($row) {
			return $row->description ?: "";
		});
		$table->editColumn('image', function ($row) {
			$image = '';

			if ($row->hasImage()) {
				$image = sprintf('<img src="%s" alt="image">', $row->image_thumbnail);
			}

			return $image;
		});

		$this->rawColumns[] = 'image';
		parent::dataTables($table);
	}
	public function store(StoreMain $request): \Illuminate\Http\RedirectResponse
	{
	
		$main = Main::create($request->validated());

		 $main->addImageFromRequest();

		Cache::delete('mains');
		return redirect()->route("admin." . Str::plural($this->modelName) . ".index");
	}

	public function update(UpdateMain $request, Main $main): \Illuminate\Http\RedirectResponse
	{
		$main->update($request->validated());

		if ($request->hasFile('image')) {
			$main->addImageFromRequest();
		}
		Cache::delete('mains');
		return redirect()->route("admin." . Str::plural($this->modelName) . ".index");
	}

	public function destroy($id): \Illuminate\Http\RedirectResponse
	{
		Cache::delete('mains');

		return parent::destroy($id);
	}
	//
}

<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;

class BackEndController extends Controller
{
	protected ?Model $model;
	protected string $modelName;
	protected array  $rawColumns       = ['actions', 'placeholder'];
	protected array  $datatableActions = ['show'   => false, 'edit' => true, 'delete' => true, 'download' => false,
	                                      'create' => true, 'reply' => false];

	public function __construct(Model $model = null, string $modelName = '')
	{
		$this->model     = $model;
		$this->modelName = $modelName ? strtolower($modelName) : strtolower(class_basename($model));
	}

	public function index(Request $request)
	{
		abort_unless(\Auth::user()->can("index {$this->modelName}"), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$modelName = $this->modelName;
		$actions   = $this->datatableActions;

		$columns = collect(config("ryada.models.{$modelName}.columns", []));
		$columns->prepend(['data' => 'placeholder', 'name' => 'placeholder']);
		$columns->push(['data' => 'actions', 'name' => __('Actions')]);

		$query = $this->model::with($this->relationships());

		if ($request->ajax()) {
			$query->select(sprintf('%s.*', (new $this->model)->table));
			$table = Datatables::of($query);

			$table->addColumn('placeholder', '&nbsp;');
			$table->addColumn('actions', '&nbsp;');

			$table->editColumn('actions', function ($row) use ($modelName, $actions) {
				return view('back-end.inc.datatable-actions',
				            compact('modelName', 'row', 'actions'));
			});

			$this->dataTables($table);

			return $table->make(true);
		}

		$rows = $query->get();

		if (isset($this->views()['index'])) {
			return view("back-end." . Str::plural($modelName) . ".index",
			            compact('rows', 'modelName', 'columns', 'actions'));
		} else {
			return view("back-end.inc.model.index", compact('rows', 'modelName', 'columns', 'actions'));
		}
	}

	public function create()
	{
		abort_unless(\Auth::user()->can("create {$this->modelName}"), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$modelName = $this->modelName;

		if (isset($this->views()['create'])) {
			return view("back-end." . Str::plural($modelName) . ".create", compact('modelName'))->with($this->append());
		}

		return view("back-end.inc.model.create", compact('modelName'))->with($this->append());
	}

	public function edit($id)
	{
		abort_unless(\Auth::user()->can("edit {$this->modelName}"), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$modelName = $this->modelName;

		$row = $this->model::findOrFail($id);

		if (!empty($this->relationships())) {
			$row->load($this->relationships());
		}

		if (isset($this->views()['edit'])) {
			return view("back-end." . Str::plural($modelName) . ".edit",
			            compact('modelName', 'row'))->with($this->append());
		}

		return view("back-end.inc.model.edit", compact('modelName', 'row'))->with($this->append());
	}

	public function show($id)
	{
		abort_unless(\Auth::user()->can("show {$this->modelName}"), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$modelName = $this->modelName;

		$row = $this->model::findOrFail($id);

		if (!empty($this->relationships())) {
			$row->load($this->relationships());
		}

		return view("back-end.inc.model.show", compact('modelName', 'row'));
	}

	public function destroy($id)
	{
		abort_unless(\Auth::user()->can("delete {$this->modelName}"), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$row = $this->model::findOrFail($id);

		$row->delete();

		return back();
	}

	public function download($id): Media|MediaStream
	{
		$row = $this->model::findOrFail($id);

		if (method_exists($row, 'getFileMedia')) {
			return $row->getFileMedia();
		}

		$col     = $row->getFilesMedia();
		$zipName = $col->collectionName . "-" . Str::random(5) . $col->count() . ".zip";

		return MediaStream::create($zipName)->addMedia($col);
	}

	protected function filter($rows)
	{
		return $rows;
	}

	/**
	 * Array of Relationship to Eager Loading with model.
	 *
	 * @return array
	 */
	protected function relationships(): array
	{
		return [];
	}

	/**
	 * Array of Data to Send to view {create, edit}.
	 *
	 * @return array
	 */
	protected function append(): array
	{
		return [];
	}

	protected function views(): array
	{
		return [];
	}

	protected function setDatatableActions(array $actions = []): void
	{
		foreach ($actions as $key => $value) {
			$this->datatableActions[$key] = $value;
		}
	}

	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->rawColumns($this->rawColumns);
	}
}

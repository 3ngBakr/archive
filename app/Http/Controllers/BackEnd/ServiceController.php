<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Services\StoreServiceRequest;
use App\Http\Requests\BackEnd\Services\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;

class ServiceController extends BackEndController
{
	public function __construct(Service $model = null)
	{
		parent::__construct($model);
		$this->setDatatableActions(['show' => true]);
	}

	protected function views(): array
	{
		return ['index' => true];
	}

	protected function relationships(): array { 
        return ['parentService', 'services'];
     }

	protected function dataTables(EloquentDataTable &$table): void
	{
        $table->addColumn('logo', '&nbsp;');
        
		$table->editColumn('name', function ($row) {
			return $row->name ?: "";
		});

		$table->editColumn('description', function ($row) {
			return $row->description ?: "";
		});

		$table->editColumn('order_all_child', function ($row) {
			$checked = $row->order_all_child ? __('Yes') : __('No');

			return sprintf('<span class="badge rounded-pill bg-info text-dark">%s</span>', $checked);
		});

		$table->editColumn('parentService', function ($row) {
			return $row->parentService ? $row->parentService->name : "";
		});

		$table->editColumn('logo', function ($row) {
			$logo = '';

			if ($row->hasCover()) {
				$logo = sprintf('<img src="%s" alt="cover">', $row->logo_thumbnail);
			}

			return $logo;
		});

		$this->rawColumns[] = 'logo';
        $this->rawColumns[] = 'order_all_child';
		parent::dataTables($table);

	}

	public function store(StoreServiceRequest $request): \Illuminate\Http\RedirectResponse
	{
        $service = Service::create($request->validated());
		$service->addLogoFromRequest();
		
		Cache::delete('services');
		return redirect()->route('admin.services.index');
	

		}

	public function update(UpdateServiceRequest $request, Service $service): \Illuminate\Http\RedirectResponse
	{
        $service->update($request->validated());

		if ($request->hasFile('image')) {
			$service->addLogoFromRequest();
		}
		Cache::delete('services');
		return redirect()->route("admin." . Str::plural($this->modelName) . ".index");
	}

	public function destroy($id): \Illuminate\Http\RedirectResponse
	{
		Cache::delete('services');

		return parent::destroy($id);
	}
}

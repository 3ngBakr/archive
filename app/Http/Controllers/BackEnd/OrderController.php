<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Order;
use Yajra\DataTables\EloquentDataTable;

class OrderController extends BackEndController
{
	public function __construct(Order $model = null)
	{
		parent::__construct($model);
		$this->setDatatableActions(['create' => false, 'show' => true, 'edit' => false, 'reply' => true]);
	}

	protected function relationships(): array
	{
		return ['services'];
	}

	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->editColumn('name', function ($row) {
			return $row->name ?: "";
		});

		$table->editColumn('email', function ($row) {
			return $row->email ?: "";
		});

		$table->editColumn('position', function ($row) {
			return $row->position ?: "";
		});

		$table->editColumn('company', function ($row) {
			return $row->company ?: "";
		});

		$table->editColumn('services', function ($row) {
			info($row->services);
			$labels = [];

			foreach ($row->services as $service) {
				$labels[] = sprintf('<span class="badge rounded-pill bg-info text-dark">%s</span>', $service->name);
			}

			return implode(' ', $labels);
		});

		$this->rawColumns[] = 'services';
		parent::dataTables($table);
	}
}

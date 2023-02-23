<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Contact;
use Yajra\DataTables\EloquentDataTable;

class ContactController extends BackEndController
{
	public function __construct(Contact $model = null)
	{
		parent::__construct($model);
		$this->setDatatableActions(['show'     => true, 'create' => false, 'reply' => true, 'edit' => false,
		                            'download' => true]);
	}

	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->editColumn('name', function ($row) {
			return $row->name ? $row->name : "";
		});

		$table->editColumn('email', function ($row) {
			return $row->email ? $row->email : "";
		});

		$table->editColumn('phone', function ($row) {
			return $row->phone ? $row->phone : "";
		});

		$table->editColumn('subject', function ($row) {
			return $row->subject ? $row->subject : "";
		});

		parent::dataTables($table);
	}
}

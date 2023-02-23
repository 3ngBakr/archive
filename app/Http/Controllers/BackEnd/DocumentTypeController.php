<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Documents\StoreDocTypeRequest;
use App\Http\Requests\BackEnd\Documents\UpdateDocTypeRequest;
use App\Models\DocumentType;
use Yajra\DataTables\EloquentDataTable;

class DocumentTypeController extends BackendController
{
	public function __construct(DocumentType $model = null, $modelName = 'document_type')
	{
		parent::__construct($model, $modelName);
	}

	protected function dataTables(EloquentDataTable &$table)
	: void
	{
		$table->editColumn('name', function ($row) {
			return $row->name ? $row->name : "";
		});

		parent::dataTables($table);
	}

	public function store(StoreDocTypeRequest $request)
	: \Illuminate\Http\RedirectResponse
	{
		$documentType = DocumentType::create($request->validated());

		return redirect()->route('admin.document_types.index');
	}

	public function update(UpdateDocTypeRequest $request, DocumentType $documentType)
	: \Illuminate\Http\RedirectResponse
	{
		$documentType->update($request->validated());

		return redirect()->route('admin.document_types.index');
	}
}

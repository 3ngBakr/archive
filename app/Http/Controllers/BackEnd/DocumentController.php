<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Documents\StoreDocumentRequest;
use App\Http\Requests\BackEnd\Documents\UpdateDocumentRequest;
use App\Models\Document;
use App\Models\DocumentType;
use Yajra\DataTables\EloquentDataTable;

class DocumentController extends BackendController
{
	public function __construct(Document $model = null)
	{
		parent::__construct($model);
		$this->setDatatableActions(['download' => true]);
	}

	protected function relationships(): array { return ['documentTypes', 'media','users']; }

	protected function append(): array
	{
		return ['documentTypes' => DocumentType::all(['id', 'name'])->pluck('name', 'id')];
	}

	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->editColumn('name', function ($row) {
			return $row->name ? $row->name : "";
		});
		$table->editColumn('description', function ($row) {
			return $row->description ? $row->description : "";
		});

		$table->editColumn('sender', function ($row) {
			return $row->sender ? $row->sender : "";
		});

		$table->editColumn('reciver', function ($row) {
			return $row->reciver ? $row->reciver : "";
		});

		$table->editColumn('documentTypes', function ($row) {
			$labels = [];

			foreach ($row->documentTypes as $documentType) {
				$labels[] =
					sprintf('<span class="badge rounded-pill bg-info text-dark">%s</span>', $documentType->name);
			}

			return implode(' ', $labels);
		});
		$table->editColumn('users', function ($row) {
				$labels[] =
				 sprintf( $row->users->name);
			return implode(' ', $labels);
		});

		$this->rawColumns[] = 'users';
		$this->rawColumns[] = 'documentTypes' ;
	
		parent::dataTables($table);
	}

	public function store(StoreDocumentRequest $request): \Illuminate\Http\RedirectResponse
	{
		$document = \Auth::user()->documents()->create($request->validated());
		// $document = Document::create($request->only(['name', 'description']));

		$document->documentTypes()->sync($request->input('documentTypes', []));
		$document->addFileFromRequest('file');
		

		return redirect()->route('admin.documents.index');
	}

	public function update(UpdateDocumentRequest $request, Document $document): \Illuminate\Http\RedirectResponse
	{
		$document = \Auth::user()->documents()->create($request->validated());
		$document->update($request->validated());
		$document->documentTypes()->sync($request->input('documentTypes', []));

		if ($request->hasFile('file')) {
			$document->addFileFromRequest('file');
		}

		return redirect()->route('admin.documents.index');
	}
}

<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Programs\StoreProgramRequest;
use App\Http\Requests\BackEnd\Programs\UpdateProgramRequest;
use App\Models\Program;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Str;

class ProgramController extends BackEndController
{
	public function __construct(Program $model = null)
	{
		parent::__construct($model);
		$this->setDatatableActions(['show' => true]);
	}
	
	protected function views(): array
	{
		return ['index' => true];
	}

	protected function relationships(): array { 
        return ['parentProgram', 'programs'];
     }

	
	
	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->addColumn('cover', '&nbsp;');

		$table->editColumn('name', function ($row) {
			return $row->name ? $row->name : "";
		});

		$table->editColumn('parentProgram', function ($row) {
			return $row->parentProgram ? $row->parentProgram->name : "";
		});

		$table->editColumn('cover', function ($row) {
			$cover = '';

			if ($row->hasCover()) {
				$cover = sprintf('<img src="%s" alt="cover">', $row->cover_thumbnail);
			}

			return $cover;
		});

		$this->rawColumns[] = 'cover';
		parent::dataTables($table);
	}

	public function store(StoreProgramRequest $request): \Illuminate\Http\RedirectResponse
	{
		$program = Program::create($request->validated());
		$program->addCoverFromRequest();
		$program->addLogoFromRequest();

		Cache::delete('programs');

		return redirect()->route('admin.programs.index');
	}

	public function update(UpdateProgramRequest $request, Program $program): \Illuminate\Http\RedirectResponse
	{
		$program->update($request->validated());

		if ($request->hasFile('cover')) {
			$program->addCoverFromRequest();
		}

		if ($request->hasFile('logo')) {
			$program->addLogoFromRequest();
		}

		Cache::delete('programs');

		return redirect()->route('admin.programs.index');
	}

	public function destroy($id): \Illuminate\Http\RedirectResponse
	{
		Cache::delete('programs');

		return parent::destroy($id);
	}
}

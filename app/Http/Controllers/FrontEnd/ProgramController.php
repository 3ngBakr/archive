<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Program;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProgramController extends FrontEndController
{

	public function index(): Factory|View|Application
	{
		$breadcrumbs = array(
			['route' => route('programs.index'), 'text' => 'Programs'],
		);

		return view('front-end.programs.index', compact('breadcrumbs'))->with('title', __('Programs'));
	}


	public function show(Program $program): Factory|View|Application
	{
	
		$chPrograms = Program::whereHas('parentProgram')->get();
		$breadcrumbs = array(
			// ['route' => route('programs.index'), 'text' => 'Programs'],
			['route' => route('programs.show', $program->id), 'text' => "برامجنا"],
		);

		return view('front-end.programs.show', compact('chPrograms','program', 'breadcrumbs'))->with('title', "برامجنا");


	}
}

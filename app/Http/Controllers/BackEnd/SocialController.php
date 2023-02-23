<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Socials\StoreSocial;
use App\Http\Requests\BackEnd\Socials\UpdateSocial;
use App\Models\Social;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;

class SocialController extends BackEndController
{
	public function __construct(Social $model = null) 
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
		$table->editColumn('facebook', function ($row) {
			return $row->facebook ?: "";
		});
		$table->editColumn('twitter', function ($row) {
			return $row->twitter ?: "";
		});
		$table->editColumn('whatsapp', function ($row) {
			return $row->whatsapp ?: "";
		});
		$table->editColumn('instagram', function ($row) {
			return $row->instagram ?: "";
		});
		$table->editColumn('telegram', function ($row) {
			return $row->telegram ?: "";
		});
		parent::dataTables($table);
	}

	public function store(StoreSocial $request)
	{
		$social = Social::create($social->validated());
	//	$bage->addLogoFromRequest();

		Cache::delete('socials');

		return redirect()->route('admin.socials.index');
	}

	public function update(UpdateSocial $request, Social $social)
	{
		$social->update($request->validated());

		Cache::delete('socials');

		return redirect()->route('admin.socials.index');
	}


}

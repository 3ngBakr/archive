<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Partners\StorePartner;
use App\Http\Requests\BackEnd\Partners\UpdatePartner;
use App\Models\Partner;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\EloquentDataTable;

class PartnerController extends BackEndController
{
	public function __construct(Partner $model = null) { parent::__construct($model); }

	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->editColumn('name', function ($row) {
			return $row->name ?: "";
		});
		parent::dataTables($table);
	}

	public function store(StorePartner $request)
	{
		$partner = Partner::create($request->validated());
		$partner->addLogoFromRequest();

		Cache::delete('partners');

		return redirect()->route('admin.partners.index');
	}

	public function update(UpdatePartner $request, Partner $partner)
	{
		$partner->update($request->validated());

		if ($request->hasFile('logo')) {
			$partner->addLogoFromRequest();
		}

		Cache::delete('partners');

		return redirect()->route('admin.partners.index');
	}

	public function destroy($id)
	{
		Cache::delete('partners');

		return parent::destroy($id);
	}
}

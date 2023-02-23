<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Document;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DownloadController extends FrontEndController
{
	public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
	{
		$docs = Document::with('media')->get();

		$breadcrumbs = array(
			['route' => route('downloads.index'), 'text' => 'Download center'],
		);

		return view('front-end.download-center', compact('docs', 'breadcrumbs'))->with('title', __('Download center'));
	}

	public function download(Media $media): Media { return $media; }
}

<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Blogs\StoreBlog;
use App\Http\Requests\BackEnd\Blogs\UpdateBlog;
use App\Models\Blog;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Str;

class BlogController extends BackEndController
{

	public function __construct(Blog $model = null) { parent::__construct($model); }

	protected function append(): array
	{
		return ['types' => config("ryada.our_blogs_types")];
	}

	protected function dataTables(EloquentDataTable &$table): void
	{
		$table->addColumn('image', '&nbsp;');

		$table->editColumn('title', function ($row) {
			return $row->title ?: "";
		});

		$table->editColumn('type', function ($row) {
			return $row->type ? config("ryada.our_blogs_types")[$row->type] : "";
		});

		$table->editColumn('image', function ($row) {
			$image = '';

			if ($row->hasImage()) {
				$cover = sprintf('<img src="%s" alt="image">', $row->image_thumbnail);
			}

			return $image;
		});

		$this->rawColumns[] = 'image';

		parent::dataTables($table);
	}

	protected function views(): array
	{
		return ['index' => true];
	}
	
	public function store(StoreBlog $request): \Illuminate\Http\RedirectResponse
	{

		$blog = \Auth::user()->blogs()->create($request->validated());
		$blog->addImageFromRequest();

		return redirect()->route('admin.blogs.index');
	}


	public function update(UpdateBlog $request, Blog $blog): \Illuminate\Http\RedirectResponse
	{
		$blog->update($request->validated());

		if ($request->hasFile('image')) {
			$blog->addImageFromRequest();
		}

		return redirect()->route('admin.blogs.index');
	}
}

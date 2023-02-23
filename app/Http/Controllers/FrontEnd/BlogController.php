<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BlogController extends FrontEndController
{
	public function index(): Factory|View|Application
	{
		$posts = Blog::paginate(8);
		$title = __('Blog');
		$news = Blog::where('type','أخبار')->paginate(8);
		$article = Blog::where('type','مقال')->paginate(8);

		$breadcrumbs = array(
			['route' => route('blogs.index'), 'text' => 'Blog']
		);

		return view('front-end.blogs.index', compact('title', 'posts', 'news','article','breadcrumbs'));
	}

	public function show(Blog $post): Factory|View|Application
	{
		$types = config('ryada.our_blogs_types');
		$title = $post->title;

		$breadcrumbs = array(
			['route' => route('blogs.index'), 'text' => 'Blog'],
			['route' => route('blogs.show', $post->id), 'text' => $post->title]
		);

		// get previous user id
		$previous = Blog::where('id', '<', $post->id)->orderByDesc('id')->first();
		// get next user id
		$next = Blog::where('id', '>', $post->id)->orderBy('id')->first();

		return view('front-end.blogs.show', compact('post', 'types', 'title', 'breadcrumbs'))
			->with(['previous' => $previous, 'next' => $next]);
	}
}

<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Blog;
use App\Models\Document;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends FrontEndController
{
    public function index(Request $request): Factory|View|Application
    {
        $search = $request->input('search');
        $title = 'search';

        $posts = Blog::query()->where('title', 'LIKE', "%{$search}%")->orWhere('content', 'LIKE', "%{$search}%")->get();


        $docs = Document::query()->where('name', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->get();

        return view('front-end.search', compact('posts', 'docs', 'title'));
    }
}

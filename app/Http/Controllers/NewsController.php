<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsRequest $request)
    {
        $data = $request->validated();
        News::create($data);

        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        return view('newsList', compact('news'));
    }

    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(NewsRequest $request, string $id)
    {
        $news = News::findOrFail($id);
        $data = $request->validated();

        $news->update($data);

        return redirect()->route('news.index');
    }

    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index');
    }
}

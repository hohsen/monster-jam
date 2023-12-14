<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs('/images/articles_photos', $file, $fileName);

            $data = $request->validated();
            $data['photo'] = $fileName;

            Article::create($data);

            return redirect()->route('article.index');
        }else{
            $data = $request->validated();
            Article::create($data);
            return redirect()->route('article.index');
        }
    }

    public function show(Article $article)
    {
        return view('articles', compact('article'));
    }

    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs('/images/articles_photos', $file, $fileName);

            $data = $request->validated();
            $data['photo'] = $fileName;
            $article->update($data);

            return redirect()->route('article.index');
        }else{
            $data = $request->validated();
            $article->update($data);
            return redirect()->route('article.index');
        }
    }

    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('article.index');
    }
}

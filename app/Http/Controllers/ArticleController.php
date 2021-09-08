<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Interest;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function index()
    {
        $articles = Article::with(['interest'])->get();
        $interests = Interest::all();

        return view('pages.articles.index')->with([
            'articles' => $articles,
            'interests' => $interests
        ]);
    }

    public function create()
    {
        $articles = Article::all();
        $interests = Interest::all();
        
        return view('pages.articles.create')->with([
            'articles' => $articles,
            'interests' => $interests
        ]);   
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['image_url'] = $request->file('image_url')->store(
            'storage/assets/gallery_article', 'public'
        );

        Article::create($data);
        return redirect()->route('article.index');
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $interests = Interest::all();

        return view('pages.articles.edit')->with([
            'article' => $article,
            'interests' => $interests
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['image_url'] = $request->file('image_url')->store(
            'assets/gallery_article', 'public'
        );

        $data['interest_id'] = implode(",", $data['interest_id']);
     
        $article = Article::findOrFail($id);
        $article->update($data);

        return redirect()->route('article.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('article.index');
    }
}

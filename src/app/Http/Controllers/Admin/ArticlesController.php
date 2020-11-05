<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $article = new Article();
        $articles = $article->get();
        return view('admin.articles.index', compact('articles'));
    }
    public function addArticle()
    {
        return view('admin.articles.add');
    }
    public function addRequestArticle(Request $request)
    {
        $article = new Article();
        $article = $article->create([
            'title'         =>  $request->input('title'),
            'author'        =>  $request->input('author'),
            'short_text'    =>  $request->input('short_text'),
            'full_text'     =>  $request->input('full_text'),
        ]);
    }
    public function editArticle(int $id)
    {
        $article = Article::find($id);
        if (!$article){
            return abort(404);
        }
        return view('admin.articles.edit', compact('article'));
    }
    public function editRequestArticle(Request $request, int $id)
    {
        $article = Article::find($id);

        $article->title = $request->input('title');
        $article->short_text = $request->input('short_text');
        $article->full_text = $request->input('full_text');
        $article->author = $request->input('author');

        if ($article->save()) {
            return redirect()->route('articles')->with('success', 'Статья успешно обновлена');
        }
        return back()->with('error', 'Не удалось изменить статью');
    }

        public function deleteArticle(Request $request)
    {
        if($request->ajax()) {
            $id = (int)$request->input('id');
            $article = new Article();

            $article->where('id', $id)->delete();

            echo "success";
        }
    }
}


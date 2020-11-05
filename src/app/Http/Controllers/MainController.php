<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{
    public function index()
    {
        $objArticle = new Article();
        $articles = $objArticle->orderBy('id', 'desc')->paginate(10);

        return view('blog.index', ['articles' => $articles]);
    }

    public function showArticle(int $id)
    {
        {
            $objArticle = Article::find($id);
            if(!$objArticle) {
                return abort(404);
            }
            $comments = $objArticle->comments()->get();

            return view('blog.show_article', ['article' => $objArticle, 'comments' => $comments]);
        }
    }
}

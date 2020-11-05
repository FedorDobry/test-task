<?php
use App\Models\Article;

if(!function_exists('_article')) {
    function _article($article_id)
    {
        $objArticle = Article::find($article_id);
        if(!$objArticle) {
            return abort(404);
        }

        return $objArticle;
    }
}

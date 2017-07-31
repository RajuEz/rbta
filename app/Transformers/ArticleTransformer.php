<?php

namespace App\Transformers;

use App\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Article $article
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id'        => (int) $article->getAttribute('id'),
            'title'     => $article->getAttribute('title'),
            'author'    => $article->getRelation('author')->name,
            'summary'   => $article->getAttribute('content'),
            'url'       => $article->getAttribute('url'),
            'createdAt' => $article->getAttribute('created_at')->format('Y-m-d'),
        ];
    }
}

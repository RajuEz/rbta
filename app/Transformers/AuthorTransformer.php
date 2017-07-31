<?php

namespace App\Transformers;

use App\Author;
use League\Fractal\TransformerAbstract;

class AuthorTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Author $author
     * @return array
     */
    public function transform(Author $author)
    {
        return [
            'id' => (int) $author->getAttribute('id'),
            'name' => $author->getAttribute('name'),
            'createdAt' => $author->getAttribute('created_at')->format('Y-m-d')
        ];
    }
}

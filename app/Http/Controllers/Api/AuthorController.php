<?php

namespace App\Http\Controllers\Api;

use App\Author;
use App\Transformers\AuthorTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function create()
    {
        $request = request();
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->toArray(), 422);
        } else {
            $author = Author::create($request->only('name'));

            return response(
                fractal()
                    ->item($author)
                    ->transformWith(new AuthorTransformer())
                    ->toArray()['data']
            );
        }
    }


}

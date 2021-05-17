<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article as ResourcesArticle;
use App\Models\Article;
use Exception;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::paginate(10);

        return ResourcesArticle::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;

        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if ($article->save()) {
            return response()->json([
                'status_code' => 203,
                'message' => 'created successful',
                'article' => $article,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get article
        $article = Article::findOrFail($id);

        // Return single article as a Resouce
        return response()->json([
            'version' => 1,
            'author' => 'xuandat',
            'status_code' => 200,
            'message' => 'success',
            'article' => new ResourcesArticle($article),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if ($request->isMethod('patch')) {
            echo "patch \n";

            if ($request->has('title')) {
                $article->title = $request->input('title');
            }

            if ($request->has('body')) {
                $article->body = $request->input('body');
            }

            if ($article->save()) {
                return response()->json([
                    'version' => 1,
                    'author' => 'lx.xuandat@gmail.com',
                    'status_code' => 200,
                    'message' => 'update successful',
                    'article' => $article,
                ]);
            }
        }

        if ($request->isMethod('put')) {
            echo "put \n";

            $article->update($request->all());

            return response()->json([
                'version' => 1,
                'author' => 'lx.xuandat@gmail.com',
                'status_code' => 200,
                'message' => 'update successful',
                'article' => $article,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get article
        $article = Article::find($id);

        try {
            if ($article) {
                $article->delete();

                return response()->json([
                    'status_code' => 204,
                    'message' => 'delete success',
                ]);
            }

            return response()->json([
                'status_code' => 404,
                'message' => 'not found',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 200,
                'message' => 'delete Exception',
            ]);
        }
    }
}

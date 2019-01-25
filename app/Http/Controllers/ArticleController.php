<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('articles.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rd = $request->all();
        if (isset($request->file))
            $rd['file']=$request->file->storeAs('public',$request->file->getClientOriginalName());

        Article::create($rd);
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $comments = Comment::where('parent_id','=','2'.$article->id)->orderBy('updated_at')->get();
        return view('articles.show', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::orderBy('name')->get();
        return view('articles.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $rd = $request->all();
        if (isset($request->file))
            $rd['file']=$request->file->storeAs('public',$request->file->getClientOriginalName());
        $article->update($rd);
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \I$articlelluminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        Comment:: where('parent_id','=','2'.$article->id)->delete();
        $article->delete();
        return redirect()->route('article.index');
    }

    public function download(int $id)
    {

        $file = Article::where('id','=',$id)->get();
        $path=$file[0]->file;
        return response()->download(storage_path("app/$path"));
    }

}

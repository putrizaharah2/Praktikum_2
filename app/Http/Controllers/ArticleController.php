<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'title'=>'Article List',
            'articles'=>Article::all(),
            // 'route'=>route('article.create'),
        ];
        return view('admin.article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'form_title'=>'Add New Article',
            'method'=> 'POST',
            // 'route'=>route('article.store')

        ];
        return view('admin.article.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validate = $request->validate([
        'title'=> 'required|unique:articles|max:100',
        'slug'=> 'required',
        'description'=> 'required',
        'body'=> 'required',
        'picture'=> 'required |image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $picture = $request -> file('picture');
    $name = uniqid().'.'.$picture ->getClientOriginalExtension();
    $picture ->move('assets/article', $name);
    $validate['image'] = $name;
    Article::create($validate);


    return redirect()->route('article-index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'form_title'=>'Edit List',
            'method' =>'PUT' ,
            'route'=>route('article-update', $id) ,
            'article'=> Article::where('id', $id)->first(),

        ];
        return view('admin.article.edit', $data);
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
        {

        $article=Article::find($id);
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'body'=>'required',
            'picture' => 'sometimes|image'
        ]);

        if ($request->hasFile('picture')) {
            if (file_exists(public_path('assets/article/'.$article->image))) {
                unlink(public_path('assets/article/'.$article->image));
            }
            $picture = $request->file('picture');
            $name = uniqid().'.'.$picture->getClientOriginalExtension();
            $picture->move('assets/article/', $name);
            $validate['image'] = $name;
        }
        $article->update($validate);
        return redirect()->route('article-index');
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
        $destroy = Article::find($id);
        $destroy->delete();
        return redirect('/list-article');
    }
}

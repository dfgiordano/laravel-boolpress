<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Laravel\Ui\Presets\Vue;
use Illuminate\Support\Str;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view ('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $categories = Category::all();
        return view ('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|max:255',
            'post' => 'required',
            //aggiungo la validation per evitare che venga cambiato l'id delle categorie(validation laravel)
            'category_id' => 'nullable|exists:categories, id'
        ]);

        $newPost = new Post();
        $slug = Str::slug($data['title'], '-');
        //vado a sostituire il riempimento ad uno ad uno, ma devo definire fillable nel model
        $data['slug'] = $slug;
        $newPost -> fill($data);
        //faccio una query per cercare se esiste già il post, se è null non esisite,se esiste non posso inserirlo perchè unique
        $existingPostSlug = Post::where('slug' , $slug)->first();
        // dd($existingPostSlug);

        $slugBase = $slug;
        $counter = 1;

        while($existingPostSlug) {
            $slug = $slugBase . '-' . $counter;

            $existingPostSlug = Post::where('slug' , $slug)->first();
            $counter ++;
        }
        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    //show($id)
    {
        // $post = Post::findOrFail($id);

        return view ('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        //recupero le categorie per riuscire a stamparle in edit.blade.php
        $categories = Category::all();

        return view ('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        //validazione resta uguale al create
        $request->validate([
            'title' => 'required|max:255',
            'post' => 'required'
        ]);
        if($post->title != $data['title']) {
            $slug = Str::slug($data['title'], '-');

            $existingPostSlug = Post::where('slug' , $slug)->first();

            $slugBase = $slug;
            $counter = 1;

            while($existingPostSlug) {
                $slug = $slugBase . '-' . $counter;

                $existingPostSlug = Post::where('slug' , $slug)->first();
                $counter ++;
            }
            $data['slug'] = $slug;
            }
            $post->update($data);

            return redirect()->route('admin.posts.show', $post->id);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
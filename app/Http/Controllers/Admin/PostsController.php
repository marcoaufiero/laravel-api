<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Category;
use App\Post;
use App\Http\Controllers\Controller;
use App\Mail\CreatePostMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::with('category', 'tags')->paginate(10)
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        $categories = Category::All();
        $tags = Tag::All();
    
        return view('admin.posts.create', compact('categories', 'tags'));
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
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $newPost = new Post();
        
        if(array_key_exists('image', $data)){
            $cover_url = Storage::put('post_covers', $data['image']);
            $data['cover'] = $cover_url;
        }
        
        $newPost->fill($data);
        $newPost->save();

        if( array_key_exists( 'tags', $data)){
            $newPost->tags()->sync( $data['tags']);
        }

        $mail = new CreatePostMail($newPost);
        $user_email = Auth::user()->email;
        Mail::to($user_email)->send($mail);

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_post = Post::findOrFail($id);
        return view('admin.posts.show', compact('single_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::All();

        $tags = Tag::All();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
        $data = $request->all();
        $singlePost = Post::findOrFail($id);

        $singlePost->update($data);

        if(array_key_exists('tags', $data)){
            $singlePost->tags()->sync($data['tags']);
        }else{
            $singlePost->tags()->sync([]);
        }

        return redirect()->route('admin.posts.show', $singlePost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singlePost = Post::findOrFail($id);

        if($singlePost->cover){
            Storage::delete($singlePost->cover);
        }

        $singlePost->tags()->sync([]);
        $singlePost->delete();

        return redirect()->route('admin.posts.index');
    }
}

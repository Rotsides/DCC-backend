<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;

class PostsController extends Controller
{

    public function __construct()

    // We use this constructor here to so if the user is not logged in will not be able to use /blog/create and instead redirected to login page!

    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Here the posts are "posted" in the blog section by descending order

        return view('blog.index')->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //we use this to redirect to create section
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* Here is the function we use to store our data to the database. 
        First we use some validation that the selected sections are required and have been completed 
        then we create the post using Post::create with the specific data. If the creation was successful 
        user is redirected to blog section looking at a message that the post has been added or not.
        */

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg |max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'type' => $request->input('type'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post have been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // here is for the keep reading button to redirect the user to the /slug which is basically using the title name with - between words
        return view('blog.show')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // Here is to edit our post
        return view('blog.edit')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //  here is to update the post after clicking edit which basically uses the same validation as store, but without the image 
        //  also we use Post::where, where the specific slug -> edit the slug with the new data and after clicking submit the user will
        //  be redirected to /blog page looking at a message that the post has been updated!

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
        ]);

        Post::where('slug', $slug)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'type' => $request->input('type'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),

            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        // Here is where we delete the post, we selected the specific slug and we destroy it. Then the user will see a message that the post has been deleted
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')->with('message', 'Your post has been deleted!');
    }
}
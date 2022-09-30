<?php

namespace App\Http\Controllers;

//  Controller for the apis i seperated it from the database's controller to be easier for me to create  

use Illuminate\Http\Request;
use App\Models\PostApi;
use App\Http\Requests\StorePostRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;



class PostsControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(['status' => true, 'posts' => []]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //  Store function to store data to database with API
        $post = PostApi::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'type' => $request->input('type'),
            'slug' => SlugService::createSlug(PostApi::class, 'slug', $request->title),
            'image_path' => $request->input('image_path'),
            'user_id' => $request->input('user_id')

            // in Postman write user_id "1", you can leave slug empty "" and will get the title's name automatically 
        ]);

        return response()->json(['status' => true, 'message' => "Post created succesfully!", 'posts' => $post], 200);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */

    public function update(StorePostRequest $request, PostApi $post)
    {
        // Update function for API 
        $post->update($request->all());


        return response()->json(['status' => true, 'message' => "Post updated succesfully!", 'posts' => $post], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostApi $post)
    {

        //Delete function through API
        $post->delete();

        return response()->json(['status' => true, 'message' => "Post deleted succesfully!"], 200);
    }
}
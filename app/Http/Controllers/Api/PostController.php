<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Dom\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, Post $post)
    {     
        $data = $request->validated(); //Las validaciones se hacen en StorePostRequest
        
        $post = Post::create($data);
        return response()->json([
            'mensaje' => '¡Publicación creada exitosamente!!', 
            'post' => $post
        ], 201);
    }

    //Otra forma de hacer el store
    // public function store(StorePostRequest $request)
    // $post = Post::create($request->validated());
    //     return response()->json([
    //     'mensaje' => 'Publicación creada exitosamente!!'
    //     ], 201);


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'El post no se encontró :('], 404);
        }

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return response()->json([
            'mensaje' => 'Publicación actualizada exitosamente!!',
            'post'    => $post
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'El post no se encontró :('], 404);
        }

        $post->delete();
        return response()->json(['message' => 'El post ha sido eliminado con éxito ;)']);
    }
}

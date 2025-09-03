<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
       $data = $request->validated(); //Las validaciones se hacen en StoreCommentRequest
        
        $comment = Comment::create($data);
        return response()->json([
            'mensaje' => 'Comentario creado exitosamente!!', 
            'comment' => $comment
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'El post no se encontró :('], 404);
        }

        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return response()->json([
            'mensaje' => '¡Comentario actualizado exitosamente!',
            'comentario' => $comment
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json(['message' => 'El post no se encontró :('], 404);
        }

        $comment->delete();
        return response()->json(['message' => 'El post ha sido eliminado con éxito ;)']);
    }
}

<?php

namespace App\Http\Controllers\publication;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function getPostAll(Request $request)
    {
        return [
            'publication' => Publication::with('reactions', 'commentaires')->get()
        ];
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'description' => 'required|string',
            'images' => 'nullable|string',
            'times' => 'nullable|date',
            'created_at' => 'nullable|date',
        ]);

        $publication = Publication::create([
            'id_user' => $request->id_user,
            'description' => $request->description,
            'images' => $request->images,
            'created_at' => $request->created_at ?? now(),
            'times' => $request->times ?? now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Publication created successfully',
            'publication' => $publication
        ], 201);
    }

    public function getPostByUser($id){
        return [
            'publication' => Publication::with('reactions', 'commentaires')->where('id_user', $id)->get()
        ];
    }
    public function getpostId($id){
        return [
            'publication' => Publication::with('reactions', 'commentaires')->where('id', $id)->first()
        ];
    }
}

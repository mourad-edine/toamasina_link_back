<?php

namespace App\Http\Controllers\reaction;

use App\Http\Controllers\Controller;
use App\Models\Reaction;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function createreaction(Request $request)
    {
        //dd($id_publication, $id_user);
        
        $request->validate([
            'id_user' => 'required|integer',
            'id_publication' => 'required|integer',
        ]);
        $reaction = Reaction::create([
            'id_user' => $request->id_user,
            'id_publication' => $request->id_publication,
            'type' => 'like',
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Reaction created successfully',
            'reaction' => $reaction
        ], 201);
    }

    public function deletereaction(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'id_publication' => 'required|integer',
        ]);

        $reaction = Reaction::where('id_user', $request->id_user)
            ->where('id_publication', $request->id_publication)
            ->first();

        if ($reaction) {
            $reaction->delete();
            return response()->json([
                'success' => true,
                'message' => 'Reaction deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Reaction not found'
            ], 404);
        }
    }   

    public function getReactionByPublication($id)
    {
        return [
            'reaction' => Reaction::where('id_publication', $id)->get()
        ];
    }
}

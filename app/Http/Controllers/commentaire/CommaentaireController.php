<?php

namespace App\Http\Controllers\commentaire;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommaentaireController extends Controller
{
    public function getCommentaire(Request $request)
    {
        return [
            'commentaire' => Commentaire::where('id_publication', $request->id_publication)->get()
        ];
    }

    public function createCommentaire(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'id_publication' => 'required|integer',
            'contenu' => 'required|string',
            'id_commenataire' => 'nullable|integer',
        ]);

        $commentaire = Commentaire::create([
            'id_user' => $request->id_user,
            'id_publication' => $request->id_publication,
            'contenu' => $request->contenu,
            'id_commentaire' => $request->id_commenataire ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Commentaire created successfully',
            'commentaire' => $commentaire
        ], 201);
    }

    public function deleteCommentaire(Request $request, $id)
    {
        $commentaire = Commentaire::where('id', $id)->first();

        if ($commentaire) {
            $commentaire->delete();
            return response()->json([
                'success' => true,
                'message' => 'Commentaire deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Commentaire not found'
            ], 404);
        }
    }   
}

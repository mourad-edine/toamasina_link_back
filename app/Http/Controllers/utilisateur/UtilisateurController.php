<?php

namespace App\Http\Controllers\utilisateur;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function getUser(Request $request)
    {
        return [
            'utilisateur' => User::all()
        ];
    }

    public function login(Request $request){
        //dd($request->all());
        return response()->json([
            'informations' => $request->all()
        ]);
    }
}

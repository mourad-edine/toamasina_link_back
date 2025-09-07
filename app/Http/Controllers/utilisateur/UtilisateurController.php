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

    public function getUserById($id)
    {
        return [
            'utilisateur' => User::where('id', $id)->first()
        ];
    }
}

<?php

namespace App\Http\Controllers\Authuser;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        
        try {
            $code = rand(1000, 9999);  
            $codeStr = (string) $code;
            Mail::to($request->email)->send(
                new TestEmail("" , $codeStr)
            );

            return response()->json([
                'success' => true,
                'message' => 'Code envoyé par email',
                'code' => $code,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Impossible d’envoyer l’email. Vérifiez votre connexion internet.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function verification(Request $request){
        if($request){
            $tab = [
                'adresse' => $request->address,
                'code' => $request->code,
                'country' => $request->country,
                'email' => $request->email,
                'name' => $request->firstName,
                'prenom' => $request->lastName,
                'password' => $request->password,
            ];
        $user = User::create($tab);
        }
        return response()->json([
            'message' => 'Inscription réussi',
            'user' => $user
        ]);
    }

     public function login(Request $request)
    {
        // return response()->json([
        //     'informations' => $request->all()
        // ]);
        // Validation des champs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        

        // Tentative de connexion
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Identifiants invalides'
            ], 401);
        }

        // Récupérer l’utilisateur connecté
        $user = Auth::user();

        // Générer un token (Sanctum)

        return response()->json([
            'message' => 'Connexion réussie ✅',
            'user' => $user,
        ]);
    }
}
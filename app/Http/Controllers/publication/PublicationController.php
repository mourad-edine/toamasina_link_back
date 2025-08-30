<?php

namespace App\Http\Controllers\publication;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function getPost(Request $request)
    {
        return [
            'publication' => Publication::all()
        ];
    }
}

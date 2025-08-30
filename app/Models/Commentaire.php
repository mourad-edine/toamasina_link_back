<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = [
        'id_user',
        'id_publication',
        'contenu',
        'id_commenataire'
    ];
}

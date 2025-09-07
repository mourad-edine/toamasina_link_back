<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'id_user',
        'description',
        'times',
        'images',
        'location',
        'created_at',
        'updated_at'
    ];

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'id_publication');
    }
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_publication');
    }
}

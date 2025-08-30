<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'id_user',
        'id_publication',
        'id_commentaire',
        'message',
        'is_read',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $table = 'reactions'; // Specify the table name if it's not the plural of the model name
    protected $fillable = [
        'id_user',
        'id_publication',
        'type', // e.g., 'like', 'love', 'haha', etc.
        'created_at'
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'id_publication');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}

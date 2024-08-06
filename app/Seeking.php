<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seeking extends Model
{
    protected $fillable = [
        'reason','music',"season","skill","language"
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable=["description","title","reference_id","illegal","important","user_id","type"];

    
}

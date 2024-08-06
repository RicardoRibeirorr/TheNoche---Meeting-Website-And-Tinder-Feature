<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $fillable = [
        'location_id','country_id',"thread_id","updated_Image"//,"msgImageUrl"
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function location()
    {
        return $this->belongsTo('App\Location');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }
}

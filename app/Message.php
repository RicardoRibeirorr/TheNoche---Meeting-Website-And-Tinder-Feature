<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that can be set with Mass Assignment.
     *
     * @var array
     */
    protected $fillable = ['thread_id', 'user_id', 'text',"type","file"];
    

    public function thread()
    {
        return $this->belongsTo("App\Thread", 'thread_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function formated($format_auth =false){
        if($this==null)
            return null;
        return [
            "type"=>$this->type,
            "data"=>[
                "text"=>$this->text,
                "file"=>$this->file,
            ],
            "timestamp"=>$this->created_at,
            "thread_id"=>$this->thread_id,
            "id"=>$this->id,
            "author"=>$this->user->formated($format_auth)
        ];
    }

    public function formateAll($messages,$format_auth=false){
        $msgs = [];
        foreach ($messages as $key => $message) {
            $user = User::find($message->user_id);
            $author_name = $message->user_id==auth()->user()->id?"me":$user->name;
            array_push ($msgs, $message->formated($format_auth));
        }
        return $msgs;
    }

    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['user_id','participant_id','accepted','post_id',"state"];
    protected $hidden = ["updated_at"];

    public function author()
    {
        return $this->belongsTo("App\User","user_id", 'id');
    }
    public function participant()
    {
        return $this->belongsTo("App\User","participant_id", 'id');
    }
    public function messages()
    {
        return $this->hasMany("App\Message", 'thread_id', 'id');
    }
    public function post()
    {
        return $this->belongsTo("App\Post");
    }

    public function formated($_withLast = false,$format_auth=false){
        if($format_auth && $this->participant_id==auth()->user()->id){
            $participant = $this->author?$this->author->formated():[
                "id"=>null,
                "name"=>"Conta fechada",
                "imageUrl"=>"/storage/default/profile.svg"
            ];
        }else{
            $participant = $this->participant?$this->participant->formated():[
                "id"=>null,
                "name"=>"Conta fechada",
                "imageUrl"=>"/storage/default/profile.svg"
            ];
        }
        if($this->post_id !=null)
            $type="post";
        else
            $type="message";
        return [
            "id"=>$this->id,
            "user_id"=>$this->user_id,
            "participant_id"=>$participant["id"],
            "participant"=>$participant,
            "post"=> $this->post,
            "timestamp"=>$this->created_at->isoFormat('dddd D'),
            "lastMessage"=>$_withLast&&$this->lastMessage()!=null?$this->lastMessage()->formated($format_auth):null,
            "accepted"=>$this->accepted,
            "updated_at"=>$this->updated_at,
            "type"=> $type,
            "state"=> $this->state
        ];
    }
    public function formatedAll($threads, $_withLast = false,$format_auth=false){
        $arr = [];
        foreach ($threads as $key => $thread) {
            array_push($arr,$thread->formated($_withLast,$format_auth));
        }
        return $arr;
    }

    public function messagesPaginate($format_auth=false){
        $paginate = $this->messages()->latest()->simplePaginate(6);
        $messages = (new Message())->formateAll($paginate->items(),$format_auth);
        return [
            "messages"=>$messages,
            "pagination"=>[
                "url"=>$paginate->nextPageUrl()
            ]
        ];
    }
    
    
    public function lastMessage(){
        return $this->messages()->latest()->first();
    }

    
    public function userNotAuth(){
        if($this->user_id == auth()->user()->id)
            return $this->participant;
        else if($this->participant_id == auth()->user()->id)
            return $this->author;
        else
            return abort(403, 'Unautorized action.');
    }
    
    public function users($_format=false){
        $author = $_format==false?$this->author:$this->author->formated();
        $participant = $_format==false?$this->participant:$this->participant->formated();
        return [
            $author,
            $participant
        ];
    }

    public function hasUser($user_id){
        if($this->user_id == $user_id || $this->participant_id == $user_id)
        return true;
            return false;
    }
}

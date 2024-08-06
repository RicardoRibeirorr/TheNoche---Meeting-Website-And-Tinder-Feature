<?php

namespace App\Http\Controllers;

use App\Events\MessageNotification;
use App\Message;
use App\Post;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index($thread_id)
    {
        // Validate data
        // Get thread or create one, and set new properties
        $thread = Thread::findOrFail($thread_id);
        if($thread->hasUser(auth()->user()->id) == false)
            return abort(403);
        $this->updateThread($thread);
        $messages_paginate = $thread->messagesPaginate(true);
        return [
            "messages"=>$messages_paginate["messages"],
            "pagination"=>$messages_paginate["pagination"],
            "thread"=>$thread->formated(false,true),
        ];
    }


    public function create()
    {
        // Validate data
        $data = $this->validateRequest();
        $data["user_id"] = auth()->user()->id;
        
        // Get thread or create one, and set new properties
        $thread = $this->thread($data);
        $this->updateThread($thread);
        auth()->user()->stats->thread_id = $thread->id;
        auth()->user()->stats->save();

        //Create message, broadcast it and return the result to author
        $message = Message::create(array_merge($data,["thread_id"=>$thread->id]))->formated();
        $threadFormated = $thread->formated();
        $threadFormated["lastMessage"]=$message;
        // $this->broadcast($threadFormated);
        
        $threadFormated["lastMessage"]["author"]["name"]="me";
        return [
            "thread"=>$threadFormated,
            "state"=>1
        ];
    }



    private function validateRequest(){
        $data = request()->validate([
            "text"=>"required|string|max:255",
            "participant_id"=>"numeric|nullable",
            "thread_id"=>"numeric|nullable",
            "file"=>"string|nullable",
            "post_id"=>"numeric|nullable",
            "type"=>"required|string"
        ]);
        return $data;
    }


    private function thread($data){
        //get by thread_id
        if($data["thread_id"]){
            $thread = Thread::findOrFail($data["thread_id"]);
            if($thread && ($thread->accepted!="1" || $thread->state!=1) && $thread->user_id == auth()->user()->id)
                return abort(403);
        //get by participant
        }else if($data["participant_id"]){
            $ids = [auth()->user()->id,$data["participant_id"]];
            $thread = Thread::whereIn("user_id",$ids)->whereIn("participant_id",$ids);
            $input = Input::all();
            if(count($input)>0 && isset($input["post_id"])){
                $thread->where("post_id",$input["post_id"]);}
            $thread = $thread->first();
            //there is no thread
            if($thread!=null && ($thread->accepted!="1" || $thread->state!=1) && $thread->user_id == auth()->user()->id)
                return abort(403);

            if($thread==null || isset($thread->id)==false){
                $participant = User::findOrFail($data["participant_id"]);
                // if(isset($data["post_id"]))
                //     $post = Post::findOrFail($data["post_id"]);
                $post = Post::find($data["post_id"]);
                $thread = Thread::create([
                    "user_id"=>auth()->user()->id,
                    "participant_id"=>$data["participant_id"],
                    "post_id"=>$post?$post->id:null
                ]);
            }
        }else{
            return abort(401);
        }
        
        // update thread(set here to update every thread also the thread sent to him self)
        return $thread;
    }
    
    // update thread
    protected function updateThread($thread){
        if($thread->participant_id == auth()->user()->id){
            $thread->accepted=1;
        }
        $thread->touch();
        $thread->save();
        return $thread;
    }


    protected function broadcast($thread){
        if($thread["participant_id"]!=auth()->user()->id)
            $participant_id = $thread["participant_id"];
        else if($thread["user_id"]!=auth()->user()->id)
            $participant_id = $thread["user_id"];
        else
            return false;
        broadcast(new MessageNotification($participant_id,$thread));
    }
}

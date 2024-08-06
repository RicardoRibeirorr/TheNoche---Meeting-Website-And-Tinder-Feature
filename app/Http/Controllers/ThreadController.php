<?php

namespace App\Http\Controllers;

use App\Post;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ThreadController extends Controller
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

    
    public function getLast(){
        return Thread::where("user_id",auth()->user()->id)->orWhere("participant_id",auth()->user()->id)->latest()->first()->formated();
        // return Thread::latest()->first()->formated();
    }

    public function find($thread_id){
        $thread = Thread::findOrFail($thread_id);
        if($thread->hasUser(auth()->user()->id))
            return $thread->formated(true,true);
        else{
            return abort(403);
        }
        // return Thread::latest()->first()->formated();
    }

    public function withUser($user_id){
        $input = Input::all();
        $ids = [$user_id,auth()->user()->id];
        $__thread = Thread::whereIn("user_id",$ids)->whereIn("participant_id",$ids);
        if(count($input)>0&&$input["post_id"]!=null){
            $__thread->where("post_id",$input["post_id"]);}
        $thread = $__thread->first();
        if($thread && $thread!=null){
            return [
                "thread"=>$thread->formated(true,true)
            ];
        }else{
            return [
                "thread"=>[
                    "post"=>count($input)>0&&$input["post_id"]?Post::findOrFail($input["post_id"]):null,
                    "participant"=>User::findOrFail($user_id)->formated(true,true)
                ],
            ];
        }
    }

    public function index(){
        $__thread = new Thread();
        $threads_paginate = $__thread->where("user_id",auth()->user()->id)->orWhere("participant_id",auth()->user()->id)->latest()->simplePaginate(5);
        return [
            "threads"=>$__thread->formatedAll($threads_paginate->items(),true,true),
            "pagination"=>[
                "url"=>$threads_paginate->nextPageUrl()
            ]
            ];
        // if($threads){
        //     return $threads;
        // }else{
        //     return abort(401,"Forbiden");
        // }
    }
}

<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\PostStoreRequest;
use App\Location;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public
    function __construct() {
        $this->middleware('auth');
    }

    private function getList($type = null) {
        $q = $this->inputRequest();

        $queryWhere = $betaQuery = $queryOrWhere = [
            ["active", "1"],
        ];


        if (is_int ($type)){
            array_push($queryWhere, ["type", $type]);
            array_push($betaQuery, ["type", $type]);
            array_push($queryOrWhere, ["type", $type]);
        }
        if (isset($q) && count($q)>0) {
                if (isset($q["for"])) {
                    array_push($queryWhere, ["content", "LIKE", "%".$q["for"]."%"]);
                    array_push($queryOrWhere, ["title", "LIKE", "%".$q["for"]."%"]);
                }
                if (isset($q["location"]) && $q["location"]!="-1") {
                    array_push($queryWhere, ["location_id", $q["location"]]);
                    array_push($queryOrWhere, ["location_id", $q["location"]]);
                }
        }
        $posts = Post::where($queryWhere)->orWhere($queryOrWhere)->whereDate('expire_at', '>', Carbon::today()->toDateString());
        
        $posts = $posts->with(["location:id,name", "user:id,image"])->orderBy("created_at", "DESC")->simplePaginate(6);
        if ($posts->count() < 6) {
            $others = Post::where($betaQuery)->whereNotIn("id",$posts->pluck("id"))->with(["location:id,name", "user:id,image"])->whereDate('expire_at', '>', Carbon::today()->toDateString())->orderBy("location_id", "DESC")->simplePaginate(6);
        }
        return [
            "others" => $others??null,
            "posts" => $posts
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index() {
        $result = $this->getList();
        $locations = auth()->user()->stats->country->locations;
        return view("/apps/post", ["posts" => $result["posts"], "user" => auth()->user(), "type" => null, "others" => $result["others"],"locations"=>$locations,"date_now"=>Carbon::now()]);
    }
    /**
     * Display a listing of the for invites.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function invites() {
        $result = $this->getList(0);
        $locations = auth()->user()->stats->country->locations;
        return view("/apps/post", ["posts" => $result["posts"], "user" => auth()->user(), "type" => "invite", "others" => $result["others"],"locations"=>$locations,"date_now"=>Carbon::now()]);
    }
    /**
     * Display a listing of the events.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function events() {
        $result = $this->getList(1);
        $locations = auth()->user()->stats->country->locations;
        return view("/apps/post", ["posts" => $result["posts"], "user" => auth()->user(), "type" => "event", "others" => $result["others"],"locations"=>$locations,"date_now"=>Carbon::now()]);
    }

    private function inputRequest() {
        $q = Input::all();
        if (isset($q["for"]) || isset($q["location"])) {
            return $q;
        } else {
            return null;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(PostStoreRequest $request) {
        $data = $request->validated();
        if (isset($data["expire_at"]) == false || $data["expire_at"] == null) {
            $date = Carbon::now();
            $modifiedMutable = $date->add(1, 'week');
            $data["expire_at"] = $modifiedMutable;
        }
        Post::create(array_merge($data, ["user_id" => auth()->user()->id]));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id) {
        //
    }

    /**
     * Update the expire resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public
    function expire($id) {
        $post = Post::findOrFail($id);
        if($post->user_id!=auth()->user()->id){
            return abort(403);
        }

        // $post->expire_at = Carbon::now();
        $post->active = false;
        $post->save();
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id) {
        $post = Post::findOrFail($id);

        if($post->user_id != auth()->user()->id){
            return abort(403);
        }
        $post->delete();
        return back();
    }
}

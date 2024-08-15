<?php

namespace App\Http\Controllers;

use App\Stats;
use App\User;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input;

class ExploreController extends Controller
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

    // private function getList(){
    //     $q = $this->inputRequest();
    //     $queryWhere = ;
    //     if($q){
    //         if(isset($q["gender"])){
    //             array_push($queryWhere,["gender",$q["gender"]]);
    //         if(isset($q["location"])){
    //             array_push($queryWhere,["gender",$q["gender"]]);
    //        }
    //     }
    //     $users = User::orderBy("views")->simplePaginate(7);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::where("description","1=",null)->where("interest","!=",null)->orderBy("views")->paginate(6);
        $q = Input::all();
       $users = User::where([["id","!=",auth()->user()->id],["email_verified_at","!=",null]])->whereHas('stats', function ($query) use($q){
        if($q!=null && count($q)>0){
            if(isset($q["location"])&&$q["location"]!="-1")
                $query->where('location_id', $q["location"]);
            if(isset($q["gender"])&&$q["gender"]!="-1")
                $query->where('gender', $q["gender"]);
            if(isset($q["for"])&&$q["for"]!=""&&$q["for"]!=null)
                $query->where('name', "LIKE", "%".$q["for"]."%");
        }
        else if(auth()->user()->stats->country_id){
                $query->where('country_id',auth()->user()->stats->country_id);
            }
        })->simplePaginate(7);

        if((isset($q["location"])||isset($q["gender"])||isset($q["for"]))&&$users->count()<7){
        $others = User::where([["id","!=",auth()->user()->id],["email_verified_at","!=",null]])->whereNotIn("id",$users->pluck("id"))->whereHas('stats', function ($query) use($q){
            if(auth()->user()->stats->country_id){
                    $query->where('country_id',auth()->user()->stats->country_id);
                }
            if(isset($q["gender"])&&$q["gender"]!="-1")
                $query->where('gender', $q["gender"]);
            })->take(7-$users->count())->get();
        }

        $locations = auth()->user()->stats->country->locations;
        return view("/apps/explore",["users"=>$users,"others"=>$others??null,"locations"=>$locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

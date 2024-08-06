<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ShuffleController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("/apps/shuffle");
    }
    public function getUser()
    {
        $hasInterest = auth()->user()->interest?["gender",auth()->user()->interest]:[];
        $user = User::where([["id","!=",auth()->user()->id],$hasInterest])->whereHas('stats', function ($query){
            if(auth()->user()->stats->country_id){
                    $query->where('country_id',auth()->user()->stats->country_id);
                }
            })->select(["name","id","description","image","gender"])->paginate(1);
        if($user->count()==0){
            $user = User::where([["id","!=",auth()->user()->id],["gender",auth()->user()->gender=="0"?1:0]])->whereHas('stats', function ($query){
                if(auth()->user()->stats->country_id){
                        $query->where('country_id',auth()->user()->stats->country_id);
                    }
                })->select(["name","id","description","image","gender"])->paginate(1);
        }
        
        return $user;
    }
    public function setUser()
    {
        return "hello";
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

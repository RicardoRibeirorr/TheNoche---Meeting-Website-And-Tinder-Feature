<?php

namespace App\Http\Controllers;

use App\Post;
use App\Report;
use App\User;
use App\Photo;
use Illuminate\Http\Request;

class ReportController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public
    function __construct() {
        $this->middleware('auth');
    }


    /**
     * Report post
     *
     * @return void
     */
    public function postCreate($id){
        $post = Post::findOrFail($id);
        return view("reports/report",["data"=>$post,"type"=>"post"]);
    }
    public function postStore($id){
        $data = request()->validate([
            "title"=>"required|string|max:100",
            "description"=>"required|string|max:255",
            "type"=>"required|string",
            "illegal"=>"nullable",
            "important"=>"nullable",
        ]);
        $post = Post::findOrFail($id);
        $data["reference_id"]=$id;
        $data["user_id"]=auth()->user()->id;
        $this->createOrUpdate($id,$data);
        return view("reports/success");
    }



    /**
     * Report user
     *
     * @return void
     */
    public function userCreate($id){
        $user = User::findOrFail($id);
        return view("reports/report",["data"=>$user,"type"=>"user"]);
    }
    public function userStore($id){
        $data = request()->validate([
            "title"=>"required|string|max:100",
            "description"=>"required|string|max:255",
            "type"=>"required|string",
            "illegal"=>"nullable",
            "important"=>"nullable",
        ]);
        $user = User::findOrFail($id);
        $data["reference_id"]=$id;
        $data["user_id"]=auth()->user()->id;
        $this->createOrUpdate($id,$data);
        return view("reports/success");
    }



    /**
     * Report photo
     *
     * @return void
     */
    public function photoCreate($id){
        $photo = Photo::findOrFail($id);
        return view("reports/report",["data"=>$photo,"type"=>"photo"]);
    }
    public function photoStore($id){
        $data = request()->validate([
            "title"=>"required|string|max:100",
            "description"=>"required|string|max:255",
            "type"=>"required|string",
            "illegal"=>"nullable",
            "important"=>"nullable",
        ]);
        $photo = Photo::findOrFail($id);
        $data["reference_id"]=$id;
        $data["user_id"]=auth()->user()->id;

            $this->createOrUpdate($id,$data);
        return view("reports/success");
    }

    /**
     * Find Report made by auth if exist
     *
     * @return void
     */
    public function createOrUpdate($id,$data){
        $report = $this->findReport($id,$data["type"]);
        if($report)
            $report->fill($data);
        else
            $report = Report::create($data);
        return $report;
    }

    /**
     * Find Report made by auth if exist
     *
     * @return void
     */
    public function findReport($id,$type){
        $report = Report::where([["type",$type],["user_id",auth()->user()->id],["reference_id",$id]])->first();
        return $report;
    }

}

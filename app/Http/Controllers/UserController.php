<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use App\Thread;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
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

    // public function contact(User $user){
    //     return [
    //         "id"=>$user->id,
    //         "name"=>$user->name,
    //         "image"=>$user->image??$user->gender==0?"http://127.0.0.1:8000/storage/pd/male.svg":"http://127.0.0.1:8000/storage/pd/female.svg",
    //     ];
    // }




    /**
     * Display the specified resource.
     *
     * @param  int  $id has user->id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if($user->id!=auth()->user()->id){
            $user->views ++;
            $user->save();
            $counter = 6;
        }
        $locations = auth()->user()->stats->country->locations;
        $posts=$user->posts()->with("location:id,name")->latest()->simplePaginate(6);
        $photoSamples=$user->photos()->limit($counter??5)->get();
        $similar=User::where([["gender",auth()->user()->gender],["interest",auth()->user()->interest]])->take(4);
        return view("/users/show",["user"=>$user,"posts"=>$posts??[],"photoSamples"=>$photoSamples,"type"=>null,"locations"=>$locations,"date_now"=>new Carbon]);
    }
    public function showPhotos(User $user)
    {
        if($user->id!=auth()->user()->id){
            $counter = 6;
        }
        // $q = Input::get("image_id");
        $photoSamples=$user->photos()->latest()->limit($counter??5)->select(["url","id","user_id"])->get();
        $photos=$user->photos()->latest()->simplePaginate(5);
        return view("/users/show",["user"=>$user,"photos"=>$photos,"posts"=>[],"type"=>"photos","photoSamples"=>$photoSamples]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id has user->id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // $this->authorize("update",$user);
        return view("users/edit",["user"=>auth()->user(),"stats"=>auth()->user()->stats]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id has user->id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $this->authorize("update",$user);      
        $data = request()->validate([
            "name"=>"required|string",
            "gender"=>"nullable|numeric",
            "interest"=>"nullable|numeric",
            "phone"=>"nullable|max:20|string",
            "description"=>"nullable|string|max:255",
            "email"=>["email","required","max:100"],
            "age"=>"required|numeric|min:18|max:120",

            "music"=>"nullable|string|max:40",
            "reason"=>"nullable|string|max:40",
            "season"=>"nullable|string|max:40",
            "skill"=>"nullable|string|max:40",
            "language"=>"nullable|string|max:40",

        ]);
        if (request('image')!=null) {
            request()->validate([
                "image"=>"image",
            ]);
            $imagePath = request('image')->store('pfl', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
            $image->save();
            $imageArray = ['image' => url("/storage/".$imagePath)];

            if($user->stats->updated_image){
                $path = "/public/".auth()->user()->image;
                if(Storage::disk('local')->exists($path)) {
                    Storage::delete($path);
                }
            }else{
                $user->stats->updated_image = true;
                $user->stats->save();
            }
        }
        if (request()->password!=null  && request()->new_password!=null && request()->confirm_password!=null){
            $validatedData = request()->validate([
                'password' => 'required|min:8',
                'new_password' => 'required|string|min:8',
                'confirm_password' => 'required|same:new_password',
            ],[
                'password.required' => 'Old password is required',
                'password.min' => 'Old password needs to have at least 6 characters',
                'new_password.required' => 'new_password is required',
                'new_password.min' => 'new_password needs to have at least 6 characters',
                'confirm_password.required' => 'Passwords is reuired',
                'confirm_password.same' => 'Passwords do not match',
            ]);
            if(auth()->user()->password != $validatedData["password"]){
                return back();
            }
            $data["password"] = bcrypt($validatedData["new_password"]);
        }

        if($data["gender"]=="-1") $data["gender"]=null;
        if($data["interest"]=="-1") $data["interest"]=null;

        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        auth()->user()->seeking()->update($this->SeekingRequest($data));
        return redirect("/profile/".$user->id); 
    }

    private function SeekingRequest($data){
        $dt = [
            "reason"=>$data["reason"],
            "music"=>$data["music"],
            "season"=>$data["season"],
            "language"=>$data["language"],
            "skill"=>$data["skill"],
        ];
        return $dt;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id has user->id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize("update",$user);
        $posts = $user->posts;
        $photos = $user->photos;
        $threads = Thread::where("user_id",$user->id)->orWhere("participant_id",$user->id)->get();
        // dd($threads);

        foreach ($posts as $post) {
            $post->delete();
        }
        foreach ($photos as $photo) {
            $photo->delete();
        }
        foreach ($threads as $thread) {
            $thread->state = 3;
            $thread->save();
        }
        $user->stats->delete();
        $user->seeking->delete();
        $user->delete();
        return redirect("home");
    }
}

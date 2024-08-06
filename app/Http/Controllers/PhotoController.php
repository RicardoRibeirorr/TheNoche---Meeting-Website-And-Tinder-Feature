<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            "upload_image"=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "description"=>"string|max:255|nullable"
            ]);
        $imagePath = request('upload_image')->store('upload', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
        $image->save();
        Photo::create([
            "user_id"=>auth()->user()->id,
            "url"=>url("storage/".$imagePath),
            "description"=>$data["description"],
        ]);
        return back();
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        if($photo->user_id != auth()->user()->id)
            return abort(403);
        
            $path = "public/".explode("storage",$photo->url)[1];
            if(Storage::disk('local')->exists($path)) {
                Storage::delete($path);
            }
            $photo->delete();
            return back();
    }
}

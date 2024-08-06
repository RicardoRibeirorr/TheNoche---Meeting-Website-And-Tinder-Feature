<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Lexx\ChatMessenger\Traits\Messagable;
// use Lexx\ChatMessenger\Models\Thread;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that assign to the class.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','thread_id','views','gender','interest',"password","phone","description","image","age"
    ];
    protected $hidden = [
        'password', 'remember_token',"terms_accepted","email","created_at","updated_at","phone"
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'terms_accepted' => 'datetime',
    ];

    /**
     * Relationships
     *
     * @var class
     */
    public function seeking()
    {
        return $this->hasOne('App\Seeking');
    }
    public function stats()
    {
        return $this->hasOne('App\Stats');
    }
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function threadsHasAuthor(){
        return $this->hasMany('App\Thread',"user_id","id");
    }
    public function threadsHasParticipant(){
        
        return $this->hasMany('App\Thread',"participant_id","id");
    }

    // public function activeThread(){
    //         return $this->belongsTo(Thread::class,"thread_id");
    // }

    public function formated($format_auth = false){
        return [
            "name"=>$format_auth && $this->id == auth()->user()->id?"me":$this->name,
            "imageUrl"=>$this->image,
            "id"=>$this->id,
        ];
    }

    public function formatedAll($users,$format_auth = false){
        return $users->map(function ($user) use($format_auth) {
            return [
                "name"=>$format_auth && $user->id == auth()->user()->id?"me":$user->name,
                "imageUrl"=>$user->image,
                "user_id"=>$user->id,
                "id"=>null,
            ];
        });
    }

    // public function conversationSent()
    // {
    //     return $this->hasMany('App\Conversation',"from_id");
    // }

    // public function conversationReceived()
    // {
    //     return $this->hasMany('App\Conversation',"to_id");
    // }

    // public function messagesSent()
    // {
    //     return $this->hasMany('App\Message',"from_id");
    // }
    // public function messagesReceived()
    // {
    //     return $this->hasMany('App\Message',"to_id");
    // }
}

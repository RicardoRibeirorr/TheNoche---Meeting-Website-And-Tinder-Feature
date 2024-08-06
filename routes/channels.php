<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


// Broadcast::channel('chat', function ($user) {
//     return $user->select('name','id')->with("profile:id,user_id,image")->get();
//     // return (int) $user->id === (int) $id;
// });

Broadcast::channel('message.for.{id}', function ($user) {
    return $user;
    // return $user->id === Thread::findOrNew($id)->participants->where("user_id","=",$id);
});

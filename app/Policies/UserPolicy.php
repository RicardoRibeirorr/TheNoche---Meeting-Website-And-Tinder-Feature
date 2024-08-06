<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     /**
     * Determine whether the user can update the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function update(User $auth, User $user)
    {
        return $auth->id == $user->id;
    }

    // public function verifyed(User $auth){
    //     return $auth->hasVerifiedEmail();
    // }
}

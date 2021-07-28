<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Notification;

class UserObserver
{
    
    public function created(User $user)
    {
        $data = [
            'body'      => "Vous avez reçu Une notification d'inscription",
            'message'   => "Vous avez bien crée votre compte avec nous, Pour accèder au platform :",
            'url'       => url('/'),
            'thanks'    => "Merci pour votre interêt à notre centre"
        ];

        Notification::send($user->email,new Enrollment($data));
    }

 
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}

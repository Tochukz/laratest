<?php

namespace App\Listeners;

use App\Events\NewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Event;

class NewUserHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // You mass use type hint to automatically inject a type or instance you might need
    }

    /**
     * Handle the event.
     *
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
       $evt = serialize($event);
       $user = $event->user;
       unset($user->created_at);
       unset($user->updated_at);
       $usr = json_encode($user);
       $name = 'New User' . date('H:i:s');
       Event::create(['event_name' => $name, 'event' => $evt, 'user' => $usr, 'user_id' => $user->id]);
    }
}

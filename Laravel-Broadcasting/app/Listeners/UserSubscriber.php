<?php 
namespace App\Listeners;

use App\Events;
use App\Models\Event;

class UserSubscriber 
{
    public function subscribe($events) 
    {
        $events->listen(Events\UserDelete::class, 'App\Listeners\UserSubscriber@userDelete');
        $events->listen(Events\NewUser::class, 'App\Listeners\UserSubscriber@newUser');
    }

    public function userDelete(Events\UserDelete $event) 
    {
      $userId = $event->userId;
      $eventModel = Event::where('user_id', $userId)->get();
      if ($eventModel->count() > 0 && is_object($eventModel[0])) {
          $eventModel[0]->delete();
      }
    }

    public function newUser(Events\NewUser $event)
    {
       // This does not work
      //$event->user->update(['subscriber_checked' => 'Yes']);
      //$event->user->save();

      $userId = $event->user->id;
      $eventModel = Event::where('user_id', $userId)->get();
      if ($eventModel->count() > 0 && is_object($eventModel[0])) {
          $eventModel[0]->update(['subscriber_checked' => 'Yes']);
      }
    }
}

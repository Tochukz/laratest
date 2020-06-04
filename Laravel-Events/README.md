## Laravel Events  
Events classes are stored in `app/Events` and listeners in `app/Listeners`   

__Registering Events & Listeners__   
This can be done in 1 of 3 ways:    
__Method 1__ : Use `$listen` property of `EventServiceProvider`.  
Add an event class as array key to the `$listen` property of `EventServiceProvider` class.  
The value of the array key will be an array of classes representing the corresponding Listeners to the event.  
```
protected $listen = [
        \App\Events\NewUser::class => [
            \App\Listeners\NewUserHandler::class
        ]
    ];
```
After this you can generate this events using the artisan command
```
> php artisan event:generate
```  

__Method 2__ Register the event in the `boot()` method of `EventServiceProvider`   
```
public function boot()
{
    parent::boot();

    Event::listen('event.name', function ($foo, $bar) {
        //
    });

     // widcard event listener
     Event::listen('event.*', function ($foo, $bar) {
        //
    });
}
```  

__Method 3__ Enable automatic event discovery.  
Create a `shouldDiscoverEvents()` method in `EventServiceProvider`  to override the `ServiceProvider` method.
```
public function shouldDiscoverEvents()
{
    return true;
}
```
This will discover all listeners in the `app/Listeners` directory unless you also create a  `discoverEventsWithin()` method and return a string referencing a different directory.  
```
protected function discoverEventsWithin()
{
    return [
        // $this->app->path('Listeners'),
        $this->app->path('AnotherDir'),
    ];
}
```
Remember to issue the `event:cache` artisan command in production if you use this method.  

__To stop propagation of an event__  
If you want to stop propagation to other listeners in then you should return false in the `handle()` method of your event listener.    


__Queued Event Listeners__  
Learn more about Laravel Queue and return for this.

__Dispatching Events__  
Use the `event()` helper and pass an instance of the event as argument  
```
use App\Events\NewUser

function create(Request $request) {
  $user = User::create($request->all());
  event(new NewUser($user));
}
```

__Event Subscriber__  
Event subscribers may subscrbe to multiple events from within the class itself.    
The subscriber class must have a `subscribe()` method which will receive a `Dispatcher` object as argument.   
```
class UserSubScriber 
{
  public function subscribe($events) {
    $events->listen('App\Events\NewUser', 'App\Listener\UserSubScriber@newUser');
    $events->listen('App\Events\UserUpdate', 'App\Listener\UserSubScriber@updateUser');
  }

  public function newUser(NewUser $event) {
    // Handle events
  }

  public function updateUser(UpdateUser $event) {
   // Handle events
  }
}
```

__Register Event Subscriber__  
Use the `$subscribe` property of the `EventServiceProvider` class to register your subscriber.  
```
protected $subscribe = [
    App\Listeners\UserSubscriber::class,
];
```

__Usefull artisan commands__  

To display a list of all events   
```
> php artisan event:list
```  
TO generate event after registering event and listener  
```
> php artisan event:generate  
```
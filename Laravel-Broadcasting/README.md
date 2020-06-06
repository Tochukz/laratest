## Laravel Broadcasting 
This demo illustrates the use of Laravel Broadcasting by implementing a simple Chat application.  
The backend uses the [_Pusher_](pusher.com/) API which is a third party _SaaS_ offering for Socket Server. Another alternative to using Pusher is to use [laravel-echo-server](https://github.com/tlaverdure/laravel-echo-server) or implementing your own Socket server with `Node.js` and `Redis`.  

__Dependency__  
The Pusher's composer module `pusher/pusher-php-server` is required
```
> composer require pusher/pusher-php-server "~3.0"  
```  

__Configure__  
To configure Pusher you need to update your `.env` file, make pusher your `BROADCAST_DRIVER` and also add API credentials for pusher.   

```
BROADCAST_DRIVER=pusher
...
PUSHER_APP_ID=111111
PUSHER_APP_KEY=dsjjkf8493-4jklkds
PUSHER_APP_SECRET=dksldkmpsd8304934kdmls
PUSHER_APP_CLUSTER=ap2
```  
You can get the API credentail on your account when you signup for Pusher.

Also you have to activate Broadcasting by uncommenting `App\Providers\BroadcastServiceProvider::class` in the `providers` key in the `config/app.php` file. 
```
return [
  ...
  App\Providers\AuthServiceProvider::class,
  App\Providers\BroadcastServiceProvider::class,
  App\Providers\EventServiceProvider::class,
  ...
]
```
After updating configs remember to run `config:cache` artisan command to refresh the config cache.  
```
> php artisan config:cache 
```
If you do not do this, the changes in config file may not take effect.  

__Front End__  
The front end may be done in two ways  
Method 1: Using `pusher-js`  
Here we use the `pusher-js` fontend library to subscribe to and bind to an event on the Pusher socket server. 
```
> npm install pusher-js
```

Method 2: Using Laravel Echo `laravel-echo`  
Laravel-Echo allows you to also subscribe to a socket channel and listen for an event.  `laravl-echo` requires `pusher-js`  
```
> npm install laravel-echo pusher-js
```  
Laravel echo make is possible to broadcase to everyother client but the sender by using the `broadcast()->toOthers()`  method you controller class.  
Remmber to uncomment `Echo`'s initialization lines in `reources/js/bootstrap.js`.   
```
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

```
  
__Articles__  
[Using Socket in Laravel](https://medium.com/swlh/guide-to-using-sockets-in-your-laravel-application-596d42367f0e#:~:text=Sockets%20allow%20real%2Dtime%20communication,application%20by%20making%20a%20chatbox.)

Also worth checking out  
[Laravel-Websocket PHP implementation](https://freek.dev/1228-introducing-laravel-websockets-an-easy-to-use-websocket-server-implemented-in-php) and alternative approching to `Pusher`. See the source code on [Github](https://github.com/beyondcode/laravel-websockets)  

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/pusher', function() {
    $options = array(
        'cluster' => 'ap2',
        'useTLS' => true
      );
     $pusher = new \Pusher\Pusher(
            'beb3049693cc846ffc2c',
            '91795a10241bc6ca1713',
            '1014005',
            $options
          );
        
          $data['message'] = 'hello native';
          $pusher->trigger('my-channel', 'my-event', $data);
});
Route::get('/test', 'ChatController@test');

Route::get('/{x?}/{y?}', 'ChatController@chat');




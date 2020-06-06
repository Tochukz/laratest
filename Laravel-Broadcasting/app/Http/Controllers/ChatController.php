<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSend;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $message = $request->input('message', '');

        if (strlen($message)) {
            event(new MessageSend($message));
            //broadcast(new MessageSend($message))->toOthers(); //This can only work with Laravel Echo 
            //$this->nativePusher($message);
            return $message;
        }
        
    }

    private function nativePusher($message)
    {
        $pusherConfig = \Config::get('broadcasting.connections.pusher');
        $pusher = new \Pusher\Pusher(
                $pusherConfig['key'],
                $pusherConfig['secret'],
                $pusherConfig['app_id'], 
                $pusherConfig['options']
              );
            
        $data['message'] = $message;
        $pusher->trigger('chatbox', 'message', $data);
    }

    public function chat()
    {
        return view('home');
    }

    public function test()
    {
        return  \Config::get('broadcasting.connections.pusher');
        
    }
}

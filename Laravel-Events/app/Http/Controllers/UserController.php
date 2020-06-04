<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Events\NewUser;
use App\Events\UserDelete;


class UserController extends Controller
{
    public function create(Request $request) 
    {
       $user = User::create($request->except('_token'));
       if ($user) {
           event(new NewUser($user));
       }
       return response()->redirectTo('/');
    }

    public function users()
    {
        $users =  User::all();
        return view('users', ['users' => $users]);
    }

    public function events()
    {
        $events = Event::all();
        return view('events', ['events' => $events]);
    }

    public function destroy(Request $request)
    {
      $userId = $request->input('userId');
      $user = User::find($userId);
      $user->delete();
      event(new UserDelete($userId));
      return response()->redirectTo('/');
    } 
}

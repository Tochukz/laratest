<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\EmailJob;

class RegistrationController extends Controller
{
    public function registration()
    {
      return view('registration');
    }

    public function register(Request $request)
    {
       $fullname = $request->input('fullname');
       $username = $request->input('username');
       $email = $request->input('email');

       $user = new \stdClass();       
       $user->username = $username;
       $user->message = "You are welcome to Slat Team :)";

       /* The Mail::to() method required an object that has the propreties - name an email */
       $user->name = $fullname;
       $user->email = $email;
       

       $admin1 = new \stdClass();
       $admin1->name = "Juliana Colins";
       $admin1->email = 'chucks@bbd.co.za';

       $admin2 = new \stdClass();
       $admin2->name = 'Chile Maxwel';
       $admin2->email = 't.nwachukwu@outlook.com';

       $emailJob = new \stdClass();
       $emailJob->user = $user;
       $emailJob->ccReceiver = $admin1;
       $emailJob->bccReceiver = $admin2;

       //EmailJob::dispatch($emailJob);
       EmailJob::dispatchAfterResponse($emailJob);

       // $verified = true
       // EmailJob::dispatchIf($verified === true, $podcast);
       
       return response()->redirectTo('/welcome');
    }

    public function welcome()
    {
        return view('welcome');
    }

}

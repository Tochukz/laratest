<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\ConfirmationEmail;


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

       //$this->mailSingleAddress($user);

       $this->mailMultipleAddresses($user, $admin1, $admin2);

       return response()->redirectTo('/welcome');
    }

    private function mailSingleAddress($user)
    {
        Mail::to($user)->send(new ConfirmationEmail($user));
    }

    private function mailMultipleAddresses(object $user, object $ccReceiver, object $bccReceiver)
    {
       Mail::to($user)
            ->cc($ccReceiver)
            ->bcc($bccReceiver)
            ->send(new ConfirmationEmail($user));
    }

    public function welcome()
    {
        return view('welcome');
    }
}

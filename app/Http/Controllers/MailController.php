<?php

namespace App\Http\Controllers;

use App\Mail\MailUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
 
    // public function sendAllUsersMail(){
        
    //     $data = array('title' => 'Mail from ItSolutionStuff.com', 'body' => 'This is for testing email using smtp.'); 
    //     $subscriber = DB::table('users')->where('trail', '0')->pluck('email');
    //     // dd($subscriber);
    //         $testing = "talharao997az@gmail.com";
    //         if($testing ){
    //         Mail::to("talharao997az@gmail.com")->send(new MailUsers($data));
    //         }

            // if (filter_var($testing, FILTER_VALIDATE_EMAIL)) {
            //     Mail::to($testing)->send(new MailUsers($data));
            // } else {
            //     echo "Invalid email address: $testing";
            // }

        // foreach($subscriber as $user){
        //     Mail::to($user->email)->send(new MailUsers($data));
        // }

    // }

    public function sendAllUsersMail(Request $request){ 
        dd($request->all());
        $data = array(
            'title' => 'Title',
            'body' => 'Body'
        ); 
    
        $testing = "talharao997az@gmail.com";
    
        if ($testing) {
            Mail::send('mails.subscriber', ['data' => $data], function($message) use ($testing) {
                $message->to($testing)
                        ->from('no-reply@clickinvitation.com', 'Click Invitation') // Replace with your valid email and name
                        ->subject('Subject of the Email');
            });
        }
    }
    
    

   
    
    
}
<?php

namespace App\Http\Controllers;

use App\Mail\MailUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendAllUsersMail(Request $request){ 
        $data = array(
            'title' => $request->title,
            'body' => $request->subject
        ); 
        $subscriber = DB::table('users')->where('trail', '0')->pluck('email');
        // $testing = "talharao997az@gmail.com";
        if ($subscriber) {
            foreach($subscriber as $user){
            Mail::send('mails.subscriber', ['data' => $data], function($message) use ($user) {
                $message->to($user)
                        ->from('no-reply@clickinvitation.com', 'Click Invitation') 
                        ->subject('Click Invitation Mail');
            });
        }
        }
        return redirect()->back()->with('success', 'Mail has been sent successfully.');
    }
    
}
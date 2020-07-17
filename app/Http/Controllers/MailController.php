<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\NewSubscriberMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\User;
use App;

class MailController extends Controller
{
    public function ContactMessage(Request $request){
        $message_info = new \stdClass();
        $message_info->name = $request->message['name'];
        $message_info->email = $request->message['email'];
        $message_info->subject = $request->message['subject'];
        $message_info->message = $request->message['message'];

        $users = User::where('admin', 1)->orWhere('developer', 1)->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new ContactMail($message_info));
        }
        return response()->json('DONE', 200);
    }

    public static function new_subscriber_notification($email_address){
        $date = Carbon::now();

        $notification_object = new \stdClass;
        if(App::getLocale() == 'es'){
            $notification_object->image = base_path() . "/public/images/Subscribing_es.jpg";
        }else{
            $notification_object->image = base_path() . "/public/images/Subscribing_en.jpg";
        }

        Mail::to($email_address)->send(new NewSubscriberMail($notification_object));
    }
}

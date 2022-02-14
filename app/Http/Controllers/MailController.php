<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function send_mail(Request $request)
    {
        try {
            //code...
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $country = $request->country;
            $message = $request->message;
    
            $details = [
                'name' => $name,
                'phone' => $phone,
                'country' => $country,
                'message' => $message,
                'email' => $email,
            ];
    
            Mail::to('zirex28@gmail.com')->send(new \App\Mail\Contact($details));
            Alert::toast('Succes Send Message', 'Success Send Message');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            Alert::toast('Opps Something wrong', 'Opps Something wrong');
            return redirect()->back();
        }

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class MailController extends Controller {
   public function basic_email(Request $request){
      $data = array('name'=>"Virat Gandhi");
   
      Mail::send(['text'=>'mail'], $data, function($message) use ($request){
        $user = Auth::user();
        $name = $user->nom." ".$user->prenom;
         $message->to('nathan5580@gmail.com', 'Message Report')->subject
            ('Reporting')
            ->setBody($request->text); // assuming text/plain
            
         $message->from($user->mail,$name);
      });
      echo "Basic Email Sent. Check your inbox.";
   }
}
<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Mail;


class SendMailController extends Controller
{
    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMail()
    {
    	$content = [
    		'title'=> 'Itsolutionstuff.com mail',
    		'body'=> 'The body of your message.',
    		'button' => 'Click Here'
    		];


    	$receiverAddress = 'pavelx16@gmail.com';


    	Mail::to($receiverAddress)->send(new OrderShipped($content));


    	dd('mail send successfully');
    }
}

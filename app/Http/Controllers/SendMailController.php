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
    public function sendMail(Request $request)
    {
        // $content = [
        // 	'title'=> 'Itsolutionstuff.com mail',
        // 	'body'=> 'The body of your message.',
        // 	'button' => 'Click Here'
        // 	];


        // $receiverAddress = 'pavelx16@gmail.com';


        // Mail::to($receiverAddress)->send(new OrderShipped($content));


        // dd('mail send successfully');

        // $to = $request->input('to');
        // $subject = $request->input('subject');
        // $message = $request->input('message');
        // $headers = $request->input('headers');

        $to = $request->input('to');
        $subject = $request->input('subject');
        $content = [
            'title' => $subject,
            'body' => $request->input('message')
        ];
        $headers = $request->input('headers');

        // Mail::to($to)
        //     ->send(function ($emailMessage) use ($subject, $message, $headers) {
        //         $emailMessage->subject($subject);
        //         $emailMessage->setBody($message, 'text/html');
        //         $emailMessage->getHeaders()->addTextHeader('X-Custom-Header', $headers);
        //     });

        Mail::to($to)->send(new OrderShipped($subject, $content, $headers));


        return response()->json(['message' => 'Email sent successfully']);
    }
}

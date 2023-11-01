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
        $to = $_GET['to'];
        $subject = $_GET['subject'];
        $content = [
            'title' => $subject,
            'body' => $_GET['message']
        ];
        $headers = $_GET['headers'];
        $ccBcc = "audit_support@hi-bd.org";

        Mail::to($to)
            ->cc($ccBcc)
            ->bcc($ccBcc)
            ->send(new OrderShipped($subject, $content, $headers));
    }
}

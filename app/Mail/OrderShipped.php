<?php


namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;



class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;


    public $subject;
    public $content;
    public $customHeaders;

    public function __construct($subject, $content, $customHeaders)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->customHeaders = $customHeaders;
    }

    public function build()
    {
        return $this
            ->subject($this->subject)
            ->view('emails.orders.shipped')
            ->with([
                'emailMessage' => $this->content,
            ])
            ->withSwiftMessage(function ($content) {
                $content->getHeaders()->addTextHeader('X-Custom-Header', $this->customHeaders);
            });
    }
}

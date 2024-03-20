<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailUsers extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
     /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->subject('Subscriber Invitation')
        ->to($this->data)
        ->from('clickinvitation@gmail.com', 'Click Invitation')
        ->view('mails.subscriber')
        ->with(['data' => $this->data]);
    }
}
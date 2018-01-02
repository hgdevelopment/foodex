<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class memberapprovepassword extends Mailable
{
    use Queueable, SerializesModels;
    public $reset;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reset)
    {
         $this->reset = $reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.memberapprove')->with(['reset', $this->reset]);
    }
}

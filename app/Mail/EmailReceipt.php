<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Form;

class EmailReceipt extends Mailable
{
    use Queueable, SerializesModels;

    private $template = array();

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('pouet@avior.me')
            ->subject('Accusé de reception')
            ->view('email_receipt')
            ->with($this->template)
        ;
    }
}

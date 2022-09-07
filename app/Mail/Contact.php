<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    public $from_email, $to_email, $name, $phone, $poruka, $uri;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_email, $to_email, $name, $phone, $poruka, $uri)
    {
        $this->from_email = $from_email;
        $this->to_email = $to_email;
        $this->name = $name;
        $this->phone = $phone;
        $this->poruka = $poruka;
        $this->uri = $uri;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@croland.hr')
                    ->view('emails.contact')
                    ->subject('Upit putem kontakt forme CroLand.hr');
    }
}

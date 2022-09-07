<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderReceivedBuyer extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $vendor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $vendor)
    {
        $this->order = $order;
        $this->vendor = $vendor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@croland.hr')
                    ->subject('Narudžba zaprimljena')
                    ->view('emails.order_received_buyer');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $products)
    {
        $this->order = $order;
        $this->products = $products;
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
                    ->view('emails.order_received');
    }
}

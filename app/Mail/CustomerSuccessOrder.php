<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerSuccessOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

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
        return $this->from($this->data['company']['email'], $this->data['company']['name'])
            ->subject('# ' . $this->data['code'] . ' - Pedido realizado en Kamasa.pe')
            ->view('emails.landing.request_order-customer')
            ->with($this->data);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendClaimToTheCompany extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $customer_email)
    {
        $this->data = $data;
        $this->customer_email = $customer_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->customer_email, $this->data['person']['name'])
            ->subject('Tienes un nuevo reclamo')
            ->view('emails.landing.claim')
            ->with($this->data);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerConfirmOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $companyEmail)
    {
		$this->data = $data;
		$this->companyEmail = $companyEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->from($this->companyEmail, $this->data['company']['name'])
			->subject('Se ha confirmado la orden')
			->view('emails.landing.customer-confirm')
			->with($this->data);
	}
}

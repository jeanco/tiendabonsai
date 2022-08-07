<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionTemplate8Mail extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data, $customerEmail) {
		$this->data = $data;
		$this->customerEmail = $customerEmail;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from($this->customerEmail)
			->subject('Tienes una nueva suscripción')
			->view('template_8.emails.subscription')
			->with($this->data);
	}
}

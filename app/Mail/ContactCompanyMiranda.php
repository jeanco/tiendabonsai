<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactCompanyMiranda extends Mailable {
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
		return $this->from($this->customerEmail, $this->data['name'])
			->subject($this->data['subject'])
			->view('miranda.emails.contact')
			->with($this->data);
	}
}

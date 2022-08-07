<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanySuccessfulOrder extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data, $customerEmail, $companyMainName) {
		$this->data = $data;
		$this->customerEmail = $customerEmail;
		$this->companyMainName = $companyMainName;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from($this->customerEmail, $this->companyMainName)
			->subject('Tienes un nuevo pedido')
			->view('emails.admin.customer')
			->with($this->data);
	}
}

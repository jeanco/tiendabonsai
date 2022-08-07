<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyQuotationTemplate8 extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from($this->data['company_main_email'], $this->data['company_main_name'])
			->subject($this->data['subject'])
			->view('template_8.emails.quotation_company')
			->with($this->data);
	}
}

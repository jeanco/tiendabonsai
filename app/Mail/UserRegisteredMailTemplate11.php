<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegisteredMailTemplate11 extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data, $receptor_email) {
		$this->data = $data;
		$this->receptor_email = $receptor_email;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from($this->receptor_email)
			->subject('¡Registro exitoso!')
			->view('template_11.emails.register')
			->with($this->data);
		}
}

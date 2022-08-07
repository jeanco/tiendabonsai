<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailOrder extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data, $customerEmail)
  {
    $this->data = $data;
    $this->customerEmail = $customerEmail;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from($this->customerEmail)
      ->subject('# ' . $this->data['code'] . ' - Pedido de ' . $this->data['name'] . ' desde la Tienda Virtual')
      ->view('emails.admin.request-order')
      ->with($this->data);
  }
}

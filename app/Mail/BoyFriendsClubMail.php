<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BoyFriendsClubMail extends Mailable
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
        return $this->from($this->data['company_email'], 'Club de novios Kamasa.pe')
            ->subject('Kamasa.pe - Solicitud para el programa Club de Novios')
            ->view('emails.landing.boyfriends')
            ->with($this->data);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fromaddress;
    public $messageBody;
    public $notification;
    public $name;
    public $phone;

    /**
     * Create a new message instance.
     *
     * @param string $from
     * @param string $messageBody
     * @param string $notification
     * @param string $name
     */
    public function __construct($from, $messageBody, $notification, $name,$phone)
    {
        $this->fromaddress = $from;
        $this->messageBody = $messageBody;
        $this->notification = $notification;
        $this->name = $name; // Store the name
        $this->phone = $phone; // Store the name
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->fromaddress)
                    ->subject($this->notification)
                    ->view('emails_registration', [
                        'messageBody' => $this->messageBody,
                        'name' => $this->name,
                        'phone' => $this->phone
                    ]);
    }
}

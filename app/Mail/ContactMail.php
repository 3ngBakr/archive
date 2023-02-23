<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue
{
	use Queueable;
	use SerializesModels;

	public Contact $contact;

	public function __construct(Contact $contact)
	{
		$this->contact = $contact;
	}

	public function build()
	{
		return $this->from($this->contact->email)
		            ->to(config('ryada.contact_email'))
		            ->subject($this->contact->subject)
		            ->view('emails.contact-email');
	}
}

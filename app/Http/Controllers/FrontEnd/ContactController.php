<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Requests\FrontEnd\ContactFormRequest;
use App\Models\Contact;

class ContactController extends FrontEndController
{
	public function index(): \Illuminate\Contracts\View\View
	{
		return view('front-end.contact-us')->with(['title' => __('Contact Us')]);
	}

	public function store(ContactFormRequest $request): \Illuminate\Http\RedirectResponse
	{
		$contact = Contact::create($request->validated());

		if ($request->hasFile('file')) {
			$contact->addFileFromRequest();
		}

		// Mail::send(new ContactMail($contact));
		return back()->with('success', __('Message has been sent, we will contact you soon.'));
	}
}

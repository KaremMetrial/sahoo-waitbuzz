<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        // Validate
        $validated = $request->validated();

        // Save to DB
        Contact::create($validated);

        flash()->success( __('site.contact.success'));
        return redirect()->back();
    }

}

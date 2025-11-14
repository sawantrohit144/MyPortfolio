<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contacts.index', compact('contact'));
    }

    public function create()
    {
        $existingContact = Contact::first();

        if ($existingContact) {
            return redirect()
                ->route('admin.contacts.edit', $existingContact->id)
                ->with('info', 'A contact already exists. You can only edit the existing contact.');
        }

        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        // Ensure only one contact
        $contactExists = Contact::first();
        if ($contactExists) {
            return redirect()->route('admin.contacts.edit', $contactExists->id)
                             ->with('info', 'Contact already exists. Please edit it instead.');
        }

        // Validate
        $validated = $request->validate([
            'lead' => 'required|string|max:500',
            'methods' => 'nullable|array',
            'methods.*.type' => 'nullable|string|max:50',
            'methods.*.value' => 'nullable|string|max:255',
            'methods.*.icon' => 'nullable|string|max:255',
            'methods.*.link' => 'nullable|string|max:255',
        ]);

        Contact::create([
            'lead' => $validated['lead'],
            'methods' => $validated['methods'] ?? [],
        ]);

        return redirect()->route('admin.contacts.index')
                         ->with('success', 'Contact created successfully!');
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'lead' => 'required|string|max:500',
            'methods' => 'nullable|array',
            'methods.*.type' => 'nullable|string|max:50',
            'methods.*.value' => 'nullable|string|max:255',
            'methods.*.icon' => 'nullable|string|max:255',
            'methods.*.link' => 'nullable|string|max:255',
        ]);

        $contact->update([
            'lead' => $validated['lead'],
            'methods' => $validated['methods'] ?? [],
        ]);

        return redirect()->route('admin.contacts.index')
                         ->with('success', 'Contact updated successfully!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')
                         ->with('success', 'Contact deleted successfully!');
    }
}

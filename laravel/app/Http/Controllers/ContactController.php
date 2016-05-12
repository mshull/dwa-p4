<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    /**
     * Show index
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('contacts.index');
    }

    /**
     * Show individual page
     *
     * @return \Illuminate\Http\Response
     */
    public function getContacts()
    {
        return view('contacts.contact');
    }

    public function updateContact(Request $request, $account)
    {
        $id = $request->input('pk');
        $name = $request->input('name');
        $value = $request->input('value');

        $contact = \App\Contact::find($id);
        $contact[$name] = $value;
        $contact->save();

        return array('success' => 'true');
    }
}

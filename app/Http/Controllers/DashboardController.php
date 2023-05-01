<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id', auth()->id)->orderBy('name')->get();

        return view('pages.dahboard', compact('contacts'));
    }

    public function storeGroup(Request $request)
    {
        // store group
    }

    public function deleteGroup(Request $request)
    {
        // update group
    }

    public function storeContact(Request $request)
    {
        // store contact
    }

    public function updateContact(Request $request)
    {
        // update contact
    }

    public function deleteContact(Request $request)
    {
        // update contact
    }

    public function groupContact()
    {
        // assign contact to group
    }
}

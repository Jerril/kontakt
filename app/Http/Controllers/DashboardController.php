<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id', auth()->id())->orderBy('name')->get();

        return view('pages.dashboard', compact('contacts'));
    }

    public function storeGroup(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();

        $group = Group::create($data);

        return redirect()->route('dashboard')->with('msg', "Group created successfully");
    }

    public function deleteGroup(Request $request, Group $group)
    {
        // check if the curr auth owns the group
        $group->delete();

        return redirect()->route('dashboard')->with('msg', "Group deleted successfully");
    }

    public function storeContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'group_id' => 'integer'
        ]);

        $data['user_id'] = auth()->id();

        if($request->hasFile('avatar')){
            $data['avatar'] = $request->file('avatar')->store('avatar/'.auth()->id(), 'public');
        }

        $contact = Contact::create($data);

        return redirect()->route('dashboard')->with('msg', "Contact created successfully");
    }

    public function updateContact(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'group_id' => 'integer'
        ]);

        $data['user_id'] = auth()->id();

        $contact = $contact->update($data);

        return redirect()->route('dashboard')->with('msg', "Contact updated successfully");
    }

    public function deleteContact(Request $request, Contact $contact)
    {
        $contact->delete();

        return redirect()->route('dashboard')->with('msg', "Contact deleted successfully");
    }

    public function groupContact(Request $request, Contact $contact, Group $group)
    {
        $contact->group_id = $group->id;
        $contact->save();

        return redirect()->route('dashboard')->with('msg', "Contact successfully assigned to group");
    }
}

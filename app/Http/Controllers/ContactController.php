<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ContactController extends Controller
{
    public function addContact()
    {
        return view('pages.AddContact');
    }

    public function createContact(Request $request)
    {
        $data = $request->validate([
            'contact_name' => 'required',
            'contact_email' => ['email', 'nullable'],
            'contact_phone' => 'nullable',
            'contact_company' => 'nullable',
            'user_id' => 'required'
        ]);

        $data['contact_email'] = $data['contact_email'] ?? '';
        $data['contact_phone'] = $data['contact_phone'] ?? '';
        $data['contact_company'] = $data['contact_company'] ?? '';

        $contact = Contact::create($data);
        return redirect('/home')->with('addSuccess', 'Contact edited successfully.');
    }

    public function editPage(Request $request)
    {
        $contact_id = $request->id;
        $contact = DB::table('contacts')
            ->where('id', $contact_id)
            ->where('is_deleted', false)
            ->first();

        Session::put('editContact', $contact);
        return view('pages.EditContact', ['contact_id' => $contact_id]);
    }

    public function editContact(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'contact_name' => 'required',
            'contact_email' => ['email', 'nullable'],
            'contact_phone' => 'nullable',
            'contact_company' => 'nullable',
            'user_id' => 'required'
        ]);
        $data['contact_email'] = $data['contact_email'] ?? '';
        $data['contact_phone'] = $data['contact_phone'] ?? '';
        $data['contact_company'] = $data['contact_company'] ?? '';

        //$contact->update($data);
        DB::table('contacts')->where('id', $data['id'])->update([
            'contact_name' => $data['contact_name'],
            'contact_company' => $data['contact_company'],
            'contact_phone' => $data['contact_phone'],
            'contact_email' => $data['contact_email']
        ]);
        return redirect('/home')->with('editSuccess', 'Contact edited successfully.');
    }

    public function deleteContact(Request $request)
    {
        $row = DB::table('contacts')->where('id', $request->id)->update(['is_deleted' => true]);
        //$contact->delete();
        return redirect('/home')->with('deleteSuccess', 'Contact deleted successfully.');
    }

    public function search(Request $request)
    {
        $output = null;
        $id = Session::get('id');

        // $contact = Contact::where('contact_name', 'LIKE', '%' . $request->search . '%')
        //     ->orWhere('contact_company', 'LIKE', '%' . $request->search . '%')
        //     ->orWhere('contact_phone', 'LIKE', '%' . $request->search . '%')
        //     ->orWhere('contact_email', 'LIKE', '%' . $request->search . '%')
        //     ->get();

        $contact = Contact::where(function ($query) use ($request) {
            $query->where('contact_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('contact_company', 'LIKE', '%' . $request->search . '%')
                ->orWhere('contact_phone', 'LIKE', '%' . $request->search . '%')
                ->orWhere('contact_email', 'LIKE', '%' . $request->search . '%');
        })
            ->where('user_id', $id)
            ->where('is_deleted', false)
            ->get();



        return response($contact);
    }

    public function setEditValues(Request $request)
    {
    }
}

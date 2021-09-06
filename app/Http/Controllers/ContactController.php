<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function index()
    {
        return view('pages.contact');
    }


    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'content' => 'required',
        ]);

        $data = $request->all();
        $data['status'] = false;

        try {
            Contact::create($data);
            return redirect("/contact-us")->with('success', 'Create success !');
        } catch (Exception $e) {
            return redirect("/contact-us")->with('error', $e->getMessage());
        }

        return redirect("/contact-us")->with('error', 'ERROR');
    }


    public function adminIndex(Request $request)
    {

        if ($request->q) {
            $contacts = Contact::where('name', 'like', '%' . $request->q . '%')->orderBy('id', 'desc')->paginate(3);
        } else {
            $contacts = Contact::orderBy('id', 'desc')->paginate(3);
        }
        return view('admin.contact', [
            'contacts' => $contacts,
            'q' => $request->q
        ]);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'content' => 'required',
        ]);

        $data = $request->all();

        if (isset($data['status']) && $data['status']) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }

        try {
            $contact = Contact::find($id);
            $contact->update($data);
            $contact->save();
            return redirect("admin/contact")->with('success', 'Update success !');
        } catch (Exception $e) {
            return redirect("admin/contact")->with('error', $e->getMessage());
        }

        return redirect("admin/contact")->with('error', 'ERROR');
    }

    public function delete($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            return redirect("admin/contact")->with('success', 'Delete success !');
        } catch (Exception $e) {
            return redirect("admin/contact")->with('error', $e->getMessage());
        }

        return redirect("admin/contact")->with('error', 'ERROR');
    }
}

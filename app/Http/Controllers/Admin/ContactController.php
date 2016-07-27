<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
      $contacts = Contact::all();
      return view('administrator.contact.index', compact('contacts'));
    }

    public function saw($id) {
      $contact = Contact::findOrFail($id);
      $contact->update(['status' => 1]);
      return redirect()->route('admin.contact.index');
    }

    public function remove($id) {
      $contact = Contact::findOrFail($id);
      $contact->delete();
      return redirect()->route('admin.contact.index')->with([
          'messages' => 'Xóa thành công',
          'type'  => 'success'
      ]);
    }
}

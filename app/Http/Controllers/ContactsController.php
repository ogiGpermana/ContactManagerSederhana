<?php

namespace ContactManager\Http\Controllers;

use Illuminate\Http\Request;
use ContactManager\Contact;

class ContactsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (($group_id = $request->get("group_id")))
        {
          $contacts = Contact::where('group_id', $group_id)->paginate(5);
        }
        else {
          $contacts = Contact::paginate(5);
        }

        return view('contacts.index', compact('contacts'));
    }

    public function test()
    {
        return view('contacts.form');
    }
}

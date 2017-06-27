<?php

namespace ContactManager\Http\Controllers;

use Illuminate\Http\Request;
use ContactManager\Contact;
use ContactManager\Group;

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
          $contacts = Contact::where('group_id', $group_id)->oderBy('id', 'desc')->paginate(5);
        }
        else {
          $contacts = Contact::oderBy('id', 'desc')->paginate(5);
        }

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $groups = [];
        foreach(Group::all() as $group)
        {
            $groups[$group->id] = $group->name;
        }
        return view('contacts.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'company' => ['required']
        ];

        $this->validate($request, $rules);

        Contact::create($request->all());

        return redirect("contact")->with("message", "Kontak berhasil di simpan!");
    }
}

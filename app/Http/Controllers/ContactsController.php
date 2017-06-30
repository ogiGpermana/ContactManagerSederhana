<?php

namespace ContactManager\Http\Controllers;

use Illuminate\Http\Request;
use ContactManager\Contact;
use ContactManager\Group;

class ContactsController extends Controller
{
    private $rules = [
            'name' => ['required', 'min:5'],
            'email' => ['required', 'unique:users', 'email'],
            'company' => ['required']
        ];

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (($group_id = $request->get("group_id")))
        {
          $contacts = Contact::where('group_id', $group_id)->orderBy('id', 'desc')->paginate(5);
        }
        else {
          $contacts = Contact::orderBy('id', 'desc')->paginate(5);
        }

        return view('contacts.index', compact('contacts'));
    }

    private function getGroups()
    {
        $groups = [];
        foreach(Group::all() as $group)
        {
            $groups[$group->id] = $group->name;
        }

        return $groups;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        $groups = $this->getGroups();
        return view('contacts.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $data = $this->get_request($request);

        Contact::create($data);

        return redirect("contacts")->with("message", "Kontak berhasil di simpan!");
    }

    private function get_request(Request $request)
    {
      $data = $request->all();

      if ($request->hasFile('photo'))
      {
        // Mendapatkan nama file
        $photo =  $request->file('photo')->getClientOriginalName();

        // Pindahkan file ke server

        $destination = base_path() . '/public/uploads';

        $request->file('photo')->move($destination, $photo);


        $data['photo'] = $photo;
      }

      return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = $this->getGroups();
        $contact = Contact::find($id);
        return view('contacts.edit', compact('groups', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $contact = Contact::find($id);
        $contact->update($request->all());

        return redirect("contacts")->with("message", "Kontak berhasil di update!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect("contacts")->with("message", "Kontak berhasil di hapus!");
    }
}

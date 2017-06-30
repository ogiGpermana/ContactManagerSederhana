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
            'company' => ['required'],
            'photo' => ['mimes:jpg,png,gif,bmp']
        ];

    private $upload_dir;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->upload_dir = base_path() . '/public/uploads';
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::where(function($query) use ($request){
          // Filter berdasarkan grup
          if (($group_id = $request->get("group_id")))
          {
              $query->where("group_id", $group_id);
          }

          // Filter berdasarkan kata yang di input
          if (($term = $request->get('term'))) {
            $query->orWhere('name', 'like', '%' . $term . '%');
            $query->orWhere('email', 'like', '%' . $term . '%');
            $query->orWhere('company', 'like', '%' . $term . '%');
          }
        })
        ->orderBy('id', 'desc')
        ->paginate(5);

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

        $destination = $this->upload_dir;

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

        if (!is_null($contact->photo)) {
          $file_path = $this->upload_dir . '/' . $contact->photo;
          if (file_exists($file_path)) unlink($file_path);
        }

        $contact->delete();

        return redirect("contacts")->with("message", "Kontak berhasil di hapus!");
    }
}

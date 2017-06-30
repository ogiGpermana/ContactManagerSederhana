<?php

namespace ContactManager\Http\Controllers;

use Illuminate\Http\Request;
use ContactManager\Group;

class GroupsController extends Controller
{
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required'
      ]);

      $group = Group::create($request->all());

      return response()->json(['success' => true, 'group' => $group]);
      
    }
}

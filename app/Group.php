<?php

namespace ContactManager;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function contacts()
    {
      return $this->hasMany('ContactManager\Contact');
    }
}

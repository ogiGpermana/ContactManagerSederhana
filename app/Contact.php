<?php

namespace ContactManager;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function group()
    {
      return $this->belongsTo('ContactManager\Group');
    }
}

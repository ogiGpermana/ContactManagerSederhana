<?php

namespace ContactManager;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
      'name', 'email', 'company', 'phone', 'address', 'group_id'
    ];
    public function group()
    {
      return $this->belongsTo('ContactManager\Group');
    }
}

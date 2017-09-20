<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // $filterable is what you use when you only accept certain values in the form
    // protected $fillable = ['title', 'body'];

    // Guarded is used to exclude values from being submitted via the form
    protected $guarded = ['user_id'];
}

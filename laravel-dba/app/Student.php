<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $connection = 'mysql';
    // allow all attributes to be pushed into Student model
    protected $guarded = [];
}

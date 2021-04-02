<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class StudentMongo extends Model
{
    protected $connection = 'mongodb';

    protected $collection = "student";
    // allow all attributes to be pushed into Student model
    protected $guarded = [];
}

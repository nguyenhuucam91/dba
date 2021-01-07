<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
class StudentMongo extends BaseMongoModel
{
    protected $collection = "students";
    // allow all attributes to be pushed into Student model
    protected $guarded = [];
}

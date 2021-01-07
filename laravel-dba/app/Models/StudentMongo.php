<?php

namespace App\Models;

class StudentMongo extends BaseMongoModel
{
    protected $guarded = [];

    protected $collection = "students";

    protected $primaryKey = "_id";
}

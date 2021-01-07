<?php

namespace App\Models;

class UserProfile extends BaseMongoModel
{
    protected $collection = 'user_profiles';

    //allow mass-assignment
    protected $fillable = ['full_name', 'address', 'dob', 'user_id'];

    //no created-at and updated_at field
    public $timestamps = false;

    //no primary key for this table
    public $primaryKey = null;
}

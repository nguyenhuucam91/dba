<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    //allow mass-assignment
    protected $fillable = ['full_name', 'address', 'dob', 'user_id'];

    //no created-at and updated_at field
    public $timestamps = false;
}

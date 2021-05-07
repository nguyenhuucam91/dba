<?php

namespace App\Models\Elasticsearch;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $connection = 'mysql_sakila';

    protected $table = 'film';
}

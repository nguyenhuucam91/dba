<?php

namespace App\Models\Elasticsearch;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use ElasticquentTrait;

    protected $connection = 'mysql_sakila';

    protected $table = 'film';

    public function getTypeName()
    {
        return 'films';
    }
}

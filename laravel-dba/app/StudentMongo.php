<?php

namespace App;

use Elasticquent\ElasticquentTrait;

class StudentMongo extends BaseMongoModel
{
    use ElasticquentTrait;

    protected $collection = "students";
    // allow all attributes to be pushed into Student model
    protected $guarded = [];

    protected $mappingProperties = [
        'first_name' => [
            'type' => 'keyword'
        ],
        'address' => [
            'type' => 'text'
        ]
    ];

    public function getIndexDocumentData()
    {
        return [
            'id' => $this->_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'dob' => $this->dob
        ];
    }
}

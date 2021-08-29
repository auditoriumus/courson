<?php

namespace App\Http\Repositories\ContactRepository;


use App\Http\Repositories\BaseRepository;
use App\Models\Contact;

class BaseContactRepository extends BaseRepository
{
    protected $model;

    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }
}

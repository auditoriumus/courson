<?php

namespace App\Http\Services;

use App\Http\Repositories\ContactRepository\ContactRepository;

class BaseService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
}

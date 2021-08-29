<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;

class AddNewContactService extends BaseService
{
    public function addNewContact(User $user, Request $request)
    {
        $data = [];
        $data['name'] = $request->input('name');
        $data['phone'] = $request->input('phone');
        try {
            return $this->contactRepository->addNew($user, $data);
        } catch (\Exception $e) {
            //
        }
    }
}

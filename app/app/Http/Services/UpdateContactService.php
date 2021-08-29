<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateContactService extends BaseService
{
    public function updateContactById(Request $request, int $id)
    {
        Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string',
        ])->validate();
        $data = [];
        $data['name'] = $request->input('name');
        $data['phone'] = $request->input('phone');
        try {
            $contact = $this->contactRepository->getContactById($id);
            if ($contact && $contact->isAuthor(Auth::user())) {
                return $this->contactRepository->updateById($id, $data);
            }
            return false;
        } catch (\Exception $e) {
            //
        }
    }
}

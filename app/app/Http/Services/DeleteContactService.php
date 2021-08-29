<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class DeleteContactService extends BaseService
{
    public function deleteById(int $id)
    {
        try {
            $contact = $this->contactRepository->getContactById($id);
            if ($contact && $contact->isAuthor(Auth::user())) {
                return $this->contactRepository->softDeleteById($id);
            }
            return false;
        } catch (\Exception $e) {
            //
        }
    }
}

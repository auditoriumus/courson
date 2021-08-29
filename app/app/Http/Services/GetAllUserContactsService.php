<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GetAllUserContactsService extends BaseService
{
    public function getAllUserContacts(User $user)
    {
        return $this->contactRepository->getAllByUser($user);
    }

    public function getUserContactById(int $id)
    {
        $contact = $this->contactRepository->getContactById($id);
        if ($contact && $contact->isAuthor(Auth::user())) {
            return $contact;
        }
        return false;
    }
}

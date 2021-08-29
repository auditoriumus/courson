<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class FavoritesService extends BaseService
{
    public function changeFavoriteById(int $id)
    {
        $contact = $this->contactRepository->getContactById($id);
        if ($contact && $contact->isAuthor(Auth::user())) {
            if ($contact->favorite) {
                if ($this->contactRepository->deleteFromFavorite($contact)) {
                    return 'deleted';
                }
            } else {
                if ($this->contactRepository->addToFavorite($contact)) {
                    return 'added';
                }
            }
        }
    }
}

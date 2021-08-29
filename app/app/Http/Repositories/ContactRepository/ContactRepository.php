<?php

namespace App\Http\Repositories\ContactRepository;

use App\Models\Contact;
use Illuminate\Foundation\Auth\User;

class ContactRepository extends BaseContactRepository
{

    public function getContactById(int $id)
    {
        return $this->model->find($id);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->model->all();
    }

    public function getAllByUser(User $user)
    {
        return $this->model->where('user_id', $user->id)->get();
    }

    public function addNew(User $user, array $data): bool
    {
        $this->model->user_id = $user->id;
        $this->model->name = $data['name'];
        $this->model->phone = $data['phone'];
        return $this->model->save();
    }

    public function updateById(int $id, array $data)
    {
        $contact = $this->getContactById($id);
        $contact->name = $data['name'];
        $contact->phone = $data['phone'];
        return $contact->save();
    }

    public function softDeleteById(int $id)
    {
        return $this->model
            ->find($id)
            ->delete();
    }

    public function addToFavorite(Contact $contact): bool
    {
        $contact->favorite = true;
        return $contact->save();
    }

    public function deleteFromFavorite(Contact $contact): bool
    {
        $contact->favorite = false;
        return $contact->save();
    }
}

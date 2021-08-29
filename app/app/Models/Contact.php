<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The method check contact's creator
     * @param User $user
     * @return bool
     */
    public function isAuthor(User $user): bool
    {
        return $this->user_id == $user->id;
    }
}

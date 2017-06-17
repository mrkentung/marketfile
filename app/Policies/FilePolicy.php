<?php

namespace App\Policies;

use App\User;
use App\File;

use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;

    public function touch(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }
}

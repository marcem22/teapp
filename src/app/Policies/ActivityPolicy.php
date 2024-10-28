<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Activity $activity)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Activity $activity)
    {
        return true;
    }

    public function delete(User $user, Activity $activity)
    {
        return true;
    }
}

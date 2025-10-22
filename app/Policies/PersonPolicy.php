<?php

namespace App\Policies;

use App\Models\Person;
use App\Models\User;

class PersonPolicy
{
    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'staff']);
    }

    public function view(User $user, Person $person)
    {
        return $user->church_id === $person->church_id;
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'staff']);
    }

    public function update(User $user, Person $person)
    {
        return $user->church_id === $person->church_id && in_array($user->role, ['admin', 'staff']);
    }

    public function delete(User $user, Person $person)
    {
        return $user->isAdmin();
    }
}

<?php

namespace App\Policies;

use App\Models\Choice;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChoicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role_id===Role::ADMIN ;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Choice $choice): bool
    {
        return $user->role_id===Role::ADMIN ;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Choice $choice): bool
    {
        return $user->role_id===Role::ADMIN || $user->id===$choice->student_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Choice $choice): bool
    {
        return $user->role_id===Role::ADMIN || $user->id===$choice->student_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Choice $choice): bool
    {
        return $user->role_id===Role::ADMIN || $user->id===$choice->student_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Choice $choice): bool
    {
        return $user->role_id===Role::ADMIN || $user->id===$choice->student_id;
    }
}

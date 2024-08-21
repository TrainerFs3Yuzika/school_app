<?php

namespace App\Policies;

use App\Models\Assignment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given assignment can be viewed by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Assignment $assignment)
    {
        // Allow Teachers and Super Admins to view any assignment
        if ($user->role_name === 'Super Admin' || $user->role_name === 'Teachers') {
            return true;
        }

        // Allow other users to view only their own assignments
        return $user->id === $assignment->user_id;
    }

    /**
     * Determine if the given assignment can be updated by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Assignment $assignment)
    {
        // Allow Super Admins, Teachers, or the owner of the assignment to update
        return $user->role_name === 'Super Admin' || $user->role_name === 'Teachers' || $user->id === $assignment->user_id;
    }

    /**
     * Determine if the given assignment can be deleted by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Assignment $assignment)
    {
        // Allow Super Admins, Teachers, or the owner of the assignment to delete
        return $user->role_name === 'Super Admin' || $user->role_name === 'Teachers' || $user->id === $assignment->user_id;
    }
}

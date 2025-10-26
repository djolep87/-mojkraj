<?php

namespace App\Policies;

use App\Models\Vote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Kontrola se vrši na nivou kontrolera
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vote $vote): bool
    {
        return $vote->building->hasUser($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Kontrola se vrši na nivou kontrolera
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vote $vote): bool
    {
        return $vote->building->isManager($user) && $vote->isActive();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vote $vote): bool
    {
        return $vote->building->isManager($user);
    }

    /**
     * Determine whether the user can vote.
     */
    public function vote(User $user, Vote $vote): bool
    {
        return $vote->building->hasUser($user) 
            && $vote->isActive() 
            && !$vote->hasUserVoted($user);
    }

    /**
     * Determine whether the user can view vote results.
     */
    public function viewResults(User $user, Vote $vote): bool
    {
        return $vote->building->hasUser($user);
    }
}
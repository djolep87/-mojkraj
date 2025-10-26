<?php

namespace App\Policies;

use App\Models\Building;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuildingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Svi autentifikovani korisnici mogu da vide zgrade
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Building $building): bool
    {
        return $building->hasUser($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Svi autentifikovani korisnici mogu da kreiraju zgrade
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Building $building): bool
    {
        return $building->isManager($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Building $building): bool
    {
        return $building->isManager($user);
    }

    /**
     * Determine whether the user can manage users in the building.
     */
    public function manageUsers(User $user, Building $building): bool
    {
        return $building->isManager($user);
    }

    /**
     * Determine whether the user can view expenses.
     */
    public function viewExpenses(User $user, Building $building): bool
    {
        return $building->hasUser($user);
    }

    /**
     * Determine whether the user can manage expenses.
     */
    public function manageExpenses(User $user, Building $building): bool
    {
        return $building->isManager($user);
    }

    /**
     * Determine whether the user can create votes.
     */
    public function createVotes(User $user, Building $building): bool
    {
        return $building->isManager($user);
    }

    /**
     * Determine whether the user can vote.
     */
    public function vote(User $user, Building $building): bool
    {
        return $building->hasUser($user);
    }

    /**
     * Determine whether the user can create announcements.
     */
    public function createAnnouncements(User $user, Building $building): bool
    {
        return $building->isManager($user);
    }

    /**
     * Determine whether the user can manage announcements.
     */
    public function manageAnnouncements(User $user, Building $building): bool
    {
        return $building->isManager($user);
    }
}
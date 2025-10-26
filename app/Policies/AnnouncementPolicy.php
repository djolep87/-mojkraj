<?php

namespace App\Policies;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnouncementPolicy
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
    public function view(User $user, Announcement $announcement): bool
    {
        return $announcement->building->hasUser($user);
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
    public function update(User $user, Announcement $announcement): bool
    {
        return $announcement->building->isManager($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Announcement $announcement): bool
    {
        return $announcement->building->isManager($user);
    }

    /**
     * Determine whether the user can pin/unpin the announcement.
     */
    public function pin(User $user, Announcement $announcement): bool
    {
        return $announcement->building->isManager($user);
    }

    public function unpin(User $user, Announcement $announcement): bool
    {
        return $announcement->building->isManager($user);
    }
}
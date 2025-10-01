<?php

namespace App\Policies;

use App\Models\Offer;
use App\Models\BusinessUser;
use Illuminate\Auth\Access\Response;

class OfferPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(BusinessUser $businessUser): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(BusinessUser $businessUser, Offer $offer): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(BusinessUser $businessUser): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(BusinessUser $businessUser, Offer $offer): bool
    {
        return $businessUser->id === $offer->business_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(BusinessUser $businessUser, Offer $offer): bool
    {
        return $businessUser->id === $offer->business_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(BusinessUser $businessUser, Offer $offer): bool
    {
        return $businessUser->id === $offer->business_user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(BusinessUser $businessUser, Offer $offer): bool
    {
        return $businessUser->id === $offer->business_user_id;
    }
}
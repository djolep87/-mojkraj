<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'neighborhood',
        'city',
        'postal_code',
        'latitude',
        'longitude',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    // Stambene zajednice relacije
    public function buildings()
    {
        return $this->belongsToMany(Building::class, 'building_user')
            ->withPivot('role_in_building')
            ->withTimestamps();
    }

    public function managedBuildings()
    {
        return $this->belongsToMany(Building::class, 'building_user')
            ->wherePivot('role_in_building', 'manager')
            ->withPivot('role_in_building')
            ->withTimestamps();
    }

    public function residentBuildings()
    {
        return $this->belongsToMany(Building::class, 'building_user')
            ->wherePivot('role_in_building', 'resident')
            ->withPivot('role_in_building')
            ->withTimestamps();
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class, 'owner_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function voteResults()
    {
        return $this->hasMany(VoteResult::class);
    }

    public function buildingJoinRequests()
    {
        return $this->hasMany(BuildingJoinRequest::class);
    }

    // Business ratings relacije
    public function businessRatings()
    {
        return $this->hasMany(BusinessRating::class);
    }

    public function businessRatingHelpfulVotes()
    {
        return $this->hasMany(BusinessRatingHelpfulVote::class);
    }
}

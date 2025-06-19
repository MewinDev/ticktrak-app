<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Teams\Team;
use App\Models\Teams\TeamMember;
use App\Models\Teams\TeamJoinRequest;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'profile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The team that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_members')->withPivot('role')->withTimestamp();
    }

    /**
     * Get all of the member for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function member(): HasMany
    {
        return $this->hasMany(TeamMember::class);
    }

    /**
     * Get all of the TeamJoinRequest for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function joinRequest(): HasMany
    {
        return $this->hasMany(TeamJoinRequest::class);
    }
}

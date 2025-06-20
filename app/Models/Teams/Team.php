<?php

namespace App\Models\Teams;

use App\Http\Models\User;
use App\Models\Teams\TeamMember;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['team_name', 'team_code', 'visibility', 'owner_id'];

    /**
     * Get the owner that owns the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * The members that belong to the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_members')->withPivot('role')->withTimestamp();
    }

    /**
     * Get all of the teamMembers for the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamMembers(): HasMany
    {
        return $this->hasMany(TeamMember::class);
    }

    /**
     * Get all of the joinRequests for the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function joinRequests(): HasMany
    {
        return $this->hasMany(TeamJoinRequest::class);
    }
}

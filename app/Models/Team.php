<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TeamMember;
use App\Models\TeamJoinRequest;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'picutre', 'description', 'is_public', 'created_by'];

    /**
     * Get the user that owns the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get all of the members for the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(TeamMember::class);
    }

    /**
     * Get all of the request for the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function joinRequest(): HasMany
    {
        return $this->hasMany(TeamJoinRequest::class);
    }
}

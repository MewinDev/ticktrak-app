<?php

namespace App\Models\Teams;

use App\Models\Teams\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamJoinRequest extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'user_id', 'team_id'];

    /**
     * Get the user that owns the teamJoinRequests
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the team that owns the teamJoinRequests
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}

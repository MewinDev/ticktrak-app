<?php

namespace App\Models\Teams;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamJoinRequest extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'user_id', 'team_id'];

    /**
     * Get the user that owns the TeamJoinRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the team that owns the TeamJoinRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

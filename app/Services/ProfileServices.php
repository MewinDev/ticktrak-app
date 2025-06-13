<?php

namespace App\Services;

use App\Models\User;
use App\Services\ProfileServices;
use Illuminate\Http\Request;

class ProfileServices
{
    public function updateProfile($user, $file) {
        if($file) {
            // Delete previous picture first
            if($user->picture && Storage::disk('public')->exists($user->picture)) {
                Storage::disk('public')->delete($user->profile);
            }

            $path = $file->store('user_pictures', 'public');
            $user->picture = $path;
            $user->save();

            return $path;
        }

        return $user->picture;
    }
}

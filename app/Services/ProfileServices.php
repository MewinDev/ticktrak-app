<?php

namespace App\Services;

use App\Models\User;
use App\Services\ProfileServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileServices
{
    public function updateProfile($user, $file) {
        if($file) {
            // Delete previous profile first
            if($user->profile && Storage::disk('public')->exists($user->profile)) {
                Storage::disk('public')->delete($user->profile);
            }

            $path = $file->store('user_profiles', 'public');
            $user->profile = $path;
            $user->save();

            return $path;
        }

        return $user->profile;
    }
}

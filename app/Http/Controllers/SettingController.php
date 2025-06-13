<?php

namespace App\Http\Controllers;

use \Storage;
use App\Http\Requests\SettingUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the user's Setting form.
     */
    public function edit(Request $request): View
    {
        return view('setting.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's setting information.
     */
    public function update(SettingUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('setting.edit')->with('status', 'setting-updated');
    }

    /**
     * Update the user's profile picture.
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $request->validate([
            'profile' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg', 'max:800'],
        ]);

        $user = $request->user();

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $path = $file->store('profiles', 'public');

            // Optionally, delete old profile picture if stored
            if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                \Storage::disk('public')->delete($user->profile);
            }

            $user->profile = $path;
            $user->save();
        }

        return Redirect::route('setting.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

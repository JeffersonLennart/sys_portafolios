<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function editDocente(Request $request): View
    {
        return view('docentes.edit', [
            'user' => $request->user(),
        ])->with('rol', 'Docente');
    }

    public function editRevisor(Request $request): View
    {
        return view('revisores.edit', [
            'user' => $request->user(),
        ])->with('rol', 'Revisor');
    }

    public function editAdmin(Request $request): View
    {
        return view('admins.edit', [
            'user' => $request->user(),
        ])->with('rol', 'Admin');
    }

    /**
     * Update the user's profile information.
     */
    public function updateDocente(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profileDocente.edit')->with('status', 'profile-updated');
    }

    public function updateRevisor(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profileRevisor.edit')->with('status', 'profile-updated');
    }

    public function updateAdmin(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profileAdmin.edit')->with('status', 'profile-updated');
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Department;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    function edit(Request $request)
    {
        $studiprogram = StudyProgram::all();
        $dept = Department::all();
        if ($request->isMethod('post')) {
            $this->validate($request, [ 
                'email'=> ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id, 'id')],
                'username'=> ['nullable', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user()->id, 'id')],
                'name' => ['required', 'string'],
            ]);
            User::where('id', Auth::user()->id)->update([
                'name'=> $request->name,
                'username' => $request->username,
                'front_title' => $request->front_title,
                'back_title' => $request->back_title,
                'study_programs_id' => $request->study_programs_id,
                'departments_id' => $request->departments_id,
                'email'=> $request->email,
                'nidn' => $request->nidn,
            ]);
            return redirect()->route('profile.edit')->with('msg','Profil telah diperbarui!');
        }
        return view('profile.edit', compact('studiprogram','dept'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

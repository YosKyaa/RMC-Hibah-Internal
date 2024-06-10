<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Department;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        return view('profile.show');
    }
    function edit(Request $request)
    {
        $user= Auth::user();
        $studiprogram = StudyProgram::all();
        $dept = Department::all();
        if ($request->isMethod('POST')) {
            $this->validate($request, [
                'email'=> ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id, 'id')],
                'username'=> ['nullable', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user()->id, 'id')],
                'name' => ['required', 'string'],
                'nidn' => ['required', 'string'],
                'front_title' => ['required', 'string'],
                'back_title' => ['required', 'string'],
                'study_programs_id' => ['required', 'exists:study_programs,id'],
                'departments_id' => ['required', 'exists:departments,id'],
                'image' => ['mimes:jpg,jpeg,png','max:5120'], // max 5MB
            ]);
            dd($request->all());
            $fileName = "";
            if ($request->hasFile('image')) {
                $ext = $request->image->extension();
                $name = str_replace(' ', '_', $request->image->getClientOriginalName());
                $fileName = Auth::user()->id . '_' . $name;
                $folderName = "storage/FILE/profile/" . Carbon::now()->format('Y/m');
                $path = public_path() . "/" . $folderName;
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true); //create folder
                }
                $upload = $request->image->move($path, $fileName); //upload file to folder
                if ($upload) {
                    $fileName = $folderName . "/" . $fileName;
                } else {
                    $fileName = "";
                }
            }
            User::where('id', Auth::user()->id)->update([
                'name'=> $request->name,
                'username' => $request->username,
                'front_title' => $request->front_title,
                'back_title' => $request->back_title,
                'study_programs_id' => $request->study_programs_id,
                'departments_id' => $request->departments_id,
                'email'=> $request->email,
                'nidn' => $request->nidn,
                'image' => $fileName
            ]);
            return redirect()->route('profile.edit')->with('msg','Profil telah diperbarui!');
        }
        return view('profile.edit', compact('studiprogram','dept','user'));
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

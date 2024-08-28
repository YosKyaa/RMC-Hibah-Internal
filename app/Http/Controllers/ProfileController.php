<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Department;
use App\Models\StudyProgram;
use App\Models\User;
use App\Models\Proposal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        $proposals = Proposal::where('users_id', Auth::user()->id)->with([
            'proposalTeams.researcher' => function ($query) {
                $query->select('id', 'username', 'image');
            },
            'reviewer' => function ($query) {
                $query->select('id', 'username', 'image');
            },
            'documents' // Pastikan relasi documents juga dimuat
        ])->get();

        $documentUrl = null;
        if ($proposals->isNotEmpty() && $proposals->first()->documents->isNotEmpty()) {
            $documentPath = $proposals->first()->documents->first()->proposal_doc;
            $documentUrl = url($documentPath);
        }

        return view('profile.show', compact('proposals', 'documentUrl'));
    }
    function edit(Request $request)
    {
        $user = Auth::user();
        $studiprogram = StudyProgram::all();
        $dept = Department::all();

        if ($request->isMethod('POST')) {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'username' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
                'name' => ['required', 'string'],
                'study_programs' => ['required', 'exists:study_programs,id'],
                'department' => ['required', 'exists:departments,id'],
                'image' => ['mimes:jpg,jpeg,png', 'max:5120'], // max 5MB
                'schoolar' => ['required', 'string'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);

            // Handle Image Upload
            $fileName = $user->image;
            if ($request->hasFile('image')) {
                $ext = $request->image->extension();
                $name = str_replace(' ', '_', $request->image->getClientOriginalName());
                $fileName = $user->id . '_' . $name;
                $folderName = "storage/FILE/profile/" . Carbon::now()->format('Y/m');
                $path = public_path() . "/" . $folderName;
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true); // create folder
                }
                $upload = $request->image->move($path, $fileName); // upload file to folder
                if ($upload) {
                    $fileName = $folderName . "/" . $fileName;
                } else {
                    $fileName = "";
                }
            }

            // Update User Data
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'front_title' => $request->front_title ?? '',
                'back_title' => $request->back_title ?? '',
                'study_program_id' => $request->study_programs,
                'departments_id' => $request->department,
                'email' => $request->email,
                'nidn' => $request->nidn ?? '',
                'image' => $fileName,
                'schoolar' => $request->schoolar,
            ]);

            // Handle Password Update
            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            return redirect()->route('profile.edit')->with('msg', 'Profil telah diperbarui!');
        }

        return view('profile.edit', compact('studiprogram', 'dept', 'user'));
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

    public function details($id)
    {
        // Decrypt the ID
        $decryptedId = decrypt($id);

        // Fetch the proposals using the decrypted ID
        $proposals = Proposal::with([
            'proposalTeams.researcher' => function ($query) {
                $query->select('id', 'username', 'image');
            },
            'reviewer' => function ($query) {
                $query->select('id', 'username', 'image');
            },
        ])->findOrFail($decryptedId);

        // Get the document path and URL
        $documentPath = $proposals->documents->first()->proposal_doc;
        $documentUrl = url($documentPath);

        // Fetch the user (though it looks like you're not actually using this in the view)
        $user = User::select('image')->find(auth()->id());  // Assuming you want the currently authenticated user's image

        return view('profile.details', compact('proposals', 'documentUrl', 'user'));
    }
}

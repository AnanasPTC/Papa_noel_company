<?php

namespace App\Http\Controllers;

include(app_path() . '\Utils\computeImage.php');

use App\Models\Hobby;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        return view('pages.profile.index', compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.profile.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $hobbies = Hobby::all();
        return view('pages.profile.edit', compact('user', 'hobbies'));
    }

    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'picture' => 'nullable',
            'job' => 'required|string',
        ]);

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'job' => $request->job,
        ]);

        if($request->hobbies){
            foreach ($user->hobbies as $hobby){
                $user->hobbies()->detach($hobby);
            }
            foreach ($request->hobbies as $hobby){
                $user->hobbies()->attach($hobby);
            }
        }

        if ($request->file('picture')) {
            $picture_filename = computeFilename($request->file('picture'));
            $request->file('picture')->storeAs('uploads', $picture_filename);
            if (Storage::exists('uploads/' . $user->picture)) {
                Storage::delete('uploads/' . $user->picture);
                User::whereId($user->id)->update(['picture' => $picture_filename]);
            } else {
                User::whereId($user->id)->update(['picture' => $picture_filename]);
            }
        }

        return redirect()->route('profile.index')->with('success', 'Profil mis à jour avec succès');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('home');
    }
}

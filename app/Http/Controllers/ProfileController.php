<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('pages.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'job' => 'required|string',
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $userData = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('img_path')) {
            $userData['img_path'] = $request->file('img_path')->store('profile_images');
        }

        $user->update($userData);

        return redirect()->route('pages.profile.index')->with('success', 'Profil mis à jour avec succès');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('home');
    }
}

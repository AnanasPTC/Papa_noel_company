<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function show($id): View
    {
        $user = User::findOrFail($id);
        return view('profile.show', compact('user'));
    }

    public function edit($id): View
    {
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profil mis à jour avec succès');
    }

    public function destroy($id): RedirectResponse
    {
        User::destroy($id);
        return redirect()->route('home');
    }
}

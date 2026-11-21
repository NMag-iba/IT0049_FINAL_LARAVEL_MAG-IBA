<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $staff = User::latest()->get();

        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['name'] = $validated['full_name'];

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')
                ->store('avatars', 'public');
        }

        User::create($validated);

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff account created successfully.');
    }

    public function show(User $staff)
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(User $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $staff->id,
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['name'] = $validated['full_name'];

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        if ($request->hasFile('avatar')) {
            if ($staff->avatar) {
                Storage::disk('public')->delete($staff->avatar);
            }

            $validated['avatar'] = $request->file('avatar')
                ->store('avatars', 'public');
        }

        $staff->update($validated);

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff account updated successfully.');
    }

    public function destroy(User $staff)
    {
        if ($staff->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        if ($staff->avatar) {
            Storage::disk('public')->delete($staff->avatar);
        }

        $staff->delete();

        return redirect()
            ->route('staff.index')
            ->with('success', 'Staff account deleted successfully.');
    }
}
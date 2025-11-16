<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah digunakan',
            'profile_photo.image' => 'File harus berupa gambar',
            'profile_photo.mimes' => 'Format gambar harus: jpeg, png, jpg, atau gif',
            'profile_photo.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        $data = [
            'username' => $request->username
        ];

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($admin->profile_photo) {
                Storage::disk('public')->delete($admin->profile_photo);
            }

            // Store new photo
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $data['profile_photo'] = $path;
        }

        $admin->update($data);

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profil berhasil diperbarui');
    }

    public function changePassword()
    {
        return view('admin.profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Password lama harus diisi',
            'new_password.required' => 'Password baru harus diisi',
            'new_password.min' => 'Password baru minimal 6 karakter',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok'
        ]);

        $admin = Auth::guard('admin')->user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        // Update password
        $admin->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Password berhasil diubah');
    }

    public function deletePhoto()
    {
        $admin = Auth::guard('admin')->user();

        if ($admin->profile_photo) {
            Storage::disk('public')->delete($admin->profile_photo);
            $admin->update(['profile_photo' => null]);
        }

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Foto profil berhasil dihapus');
    }
}

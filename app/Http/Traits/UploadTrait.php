<?php

namespace App\Http\Traits;

// use App\Models\User;
// use Illuminate\Http\Request;

trait UploadTrait
{
    public function uploadPhoto($request, $user)
    {
        // Hapus foto lama jika ada
        if ($user->photo !== 'my_profile.svg') {
            $photoLama = public_path('storage/users/' . $user->photo);
            if (file_exists($photoLama)) {
                unlink($photoLama);
            }
        }

        // Simpan foto baru
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $namaPhotoBaru = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs("public/users", $namaPhotoBaru);
            $user->update(['photo' => $namaPhotoBaru]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyProfileController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('cekSudahLogin');
    }


    // tampil my profile
    public function index()
    {
        $profile = User::find(session('id'));

        return view('my-profile/index', [
            'title'     => 'My Profile',
            'profile'   =>  $profile,
        ]);
    }


    // edit my profile
    public function edit()
    {
        $profile = User::find(session('id'));

        return view('my-profile/edit', [
            'title'     => 'My Profile',
            'profile'   =>  $profile,
        ]);
    }


    // update my profile
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama'      => 'required|string|max:100',
            'email'     => 'required|string|max:100|email:rfc,dns|unique:users,email,' . $user->id,
            'alamat'    => 'required|string|max:150',
            'no_hp'     => 'required|numeric|digits_between:11,13|unique:users,no_hp,' . $user->id,
        ]);

        $user->update([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'alamat'    => $request->alamat,
            'no_hp'     => $request->no_hp,
        ]);

        return redirect('/my-profile')->with('success', 'Data Profile berhasil diubah.');
    }


    // update foto profile
    public function upload(Request $request, User $user)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $this->uploadPhoto($request, $user);

        return redirect('/my-profile')->with('success', 'Photo Profile berhasil diubah.');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request){

        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
            'image' => ['image', 'max:2048']
        ]);


        $user = Auth::user();

        if($request->hasfile('image')){
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }



            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = "/uploads/".$imageName;

            $user->image = $path;

        }

        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        
        toastr()->success('Le profile a été modifié!');
        return redirect()->back();
    }
    
    /** Update Password */
    
    public function updatePassword(Request $request) 
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        
        toastr()->success('Le mot de passe a été modifié!');
        return redirect()->back();
    }
}
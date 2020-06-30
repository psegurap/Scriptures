<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminMainController extends Controller
{
    public function home()
    {
        return view('admin.index_admin');
    }

    public function profile()
    {
        $user = Auth::user();
        // dd($user);
        return view('admin.user_profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $user_data = [
            'name' => $request->profile_info['name'],
            'email' => $request->profile_info['email'],
            'phone' => $request->profile_info['phone'],
            'img_thumbnail' => $request->profile_info['img_thumbnail'],
            'attach_reference' => $request->profile_info['attach_reference'],
        ];
        User::find(Auth::user()->id)->update($user_data);
        return $request;
    }

    public function users()
    {
        if(Auth::user()->developer == 1){
            $users = User::orderBy('name')->get();
        }else{
            $users = User::where('developer', '!=', 1)->orderBy('name')->get();
        }
        // dd($users);
        return view('admin.users', compact('users'));
    }

    public function UpdatePermission(Request $request){
        User::find($request->user)->update([$request->column => $request->permission]);

        if(Auth::user()->developer == 1){
            $users = User::orderBy('name')->get();
        }else{
            $users = User::where('developer', '!=', 1)->orderBy('name')->get();
        }

        return $users;
    }


    /******************* ATTACHMENTS ******************/
    
    public function StoreProfilePicture(Request $request)
    {
        //Getting path to upload files
        $path = base_path() . "/public/images/admin/" . $request->attach_reference;
        $files = $request->file();

        //If the path doesn't exist, create it
        if(!file_exists($path)){
            mkdir($path);
        }

        //Running over every file to insert it in server
        foreach ($files['file'] as $file) {
            $file->move($path,$file->getClientOriginalName());
        }

        return response()->json("Done", 200);
    }
}

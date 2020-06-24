<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function team()
    {
        $members = Team::orderBy('name', 'asc')->get();
        // dd($team);
        return view('admin.team.team', compact('members'));
    }

    
    public function new()
    {
        return view('admin.team.new');
    }

    
    public function StoreTeam(Request $request)
    {
        $member = $request->member;
        $member_data = [
            'name' => $member['nombre'],
            'email' => $member['email'],
            'role' => $member['role_es'],
            'role_en' => $member['role_en'],
            'country' => $member['country'],
            'img_thumbnail' => $member['img_thumbnail'],
            'website' => $member['website'],
            'facebook' => $member['facebook'],
            'instagram' => $member['instagram'],
            'twitter' => $member['twitter'],
            'youtube' => $member['youtube'],
            'attach_reference' => $member['attach_reference']
        ];
       
        $member = Team::create($member_data);
        return response()->json($member, 200);
    }

    
    public function edit($id)
    {
        $member = Team::find($id);
        return view('admin.team.edit', compact('member'));
    }

    
    public function UpdateTeam(Request $request, $id)
    {
        $member = $request->member;
        $member_data = [
            'name' => $member['nombre'],
            'email' => $member['email'],
            'role' => $member['role_es'],
            'role_en' => $member['role_en'],
            'country' => $member['country'],
            'img_thumbnail' => $member['img_thumbnail'],
            'website' => $member['website'],
            'facebook' => $member['facebook'],
            'instagram' => $member['instagram'],
            'twitter' => $member['twitter'],
            'youtube' => $member['youtube'],
            'attach_reference' => $member['attach_reference']
        ];
        $member = Team::find($id)->update($member_data);
        return response()->json($member, 200);
    }

    
    public function destroy($id)
    {
        //
    }


    /******************* ATTACHMENTS ******************/
    
    public function StorePicture(Request $request)
    {
        //Getting path to upload files
        $path = base_path() . "/public/images/team/" . $request->attach_reference;
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collaborator;

class CollaboratorsController extends Controller
{
    
    public function collaborators()
    {
        $collaborators = Collaborator::all();
        dd($collaborators);
        return view('admin.collaborators.collaborators');
    }

    
    public function new()
    {
        return view('admin.collaborators.new');
    }

    
    public function StoreCollaborator(Request $request)
    {
        $collaborator = $request->collaborator;
        $collaborator_data = [
            'name' => $collaborator['nombre'],
            'email' => $collaborator['email'],
            'country' => $collaborator['country'],
            'phone' => $collaborator['phone'],
            'info_es' => $collaborator['biography_es'],
            'info_en' => $collaborator['biography_en'],
            'img_thumbnail' => $collaborator['img_thumbnail'],
            'website' => $collaborator['website'],
            'attach_reference' => $collaborator['attach_reference']
        ];
       
        $collaborator = Collaborator::create($collaborator_data);
        return response()->json($collaborator, 200);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }


    /******************* ATTACHMENTS ******************/
    
    public function StorePicture(Request $request)
    {
        //Getting path to upload files
        $path = base_path() . "/public/images/collaborators/" . $request->attach_reference;
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

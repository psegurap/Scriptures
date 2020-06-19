<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collaborator;

class CollaboratorsController extends Controller
{
    
    public function collaborators()
    {
        $collaborators = Collaborator::all();
        // dd($collaborators);
        return view('admin.collaborators.collaborators', compact('collaborators'));
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

    
    public function edit($id)
    {
        $collaborator = Collaborator::find($id);
        return view('admin.collaborators.edit', compact('collaborator'));
    }

    
    public function UpdateCollaborator(Request $request, $id)
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
        ];
        $collaborator = Collaborator::find($id)->update($collaborator_data);
        return response()->json($collaborator, 200);
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

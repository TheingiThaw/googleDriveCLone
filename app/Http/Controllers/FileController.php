<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFolderRequest;

class FileController extends Controller
{
    //my files
    public function myFiles(){
        return Inertia::render('app/MyFiles');
    }

    public function createFolderPage(){
        return Inertia::render('app/CreateFolder');
    }

    public function createFolder(StoreFolderRequest $request){

        $data = $request->validated();

        $parent = $request->parent;
        if(!$parent){
            $parent = $this->getRoot();
        }

        $file = new File();
        $file->name = $data['name'];
        $file->is_folder = 1;
        $parent->appendNode($file);

    }

    private function getRoot(){
        return File::query()->whereisRoot()->where('created_by', auth()->user()->id)->firstOrFail();
    }
}

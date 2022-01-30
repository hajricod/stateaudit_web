<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\StandardFile;
use App\Models\StandardFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StandardsController extends Controller
{
    public $path = 'admin.standards.';

    public function index()
    {
        $standardFolders = StandardFolder::where('sub_standard_folder_id', null)->orderBy('sort')->get();
        $languages       = Language::all();
        
        return view($this->path.'index', compact('standardFolders', 'languages'));
    }

    public function storeFolder(Request $request)
    {
        $standardFolder = new StandardFolder($this->validateFolder($request));
        $standardFolder->save();
    }

    public function updateFolder(Request $request, $id)
    {
        $standardFolder = new StandardFolder();

        $standardFolder = $standardFolder->find($id);

        $standardFolder->update($this->validateFolder($request));
    }

    public function destroyFolder($id)
    {
        $standardFolder = new StandardFolder();

        $standardFolder = $standardFolder->find($id);

        $files     = $standardFolder->standardFiles;
        $folders   = $standardFolder->standardSubFolders;

        if($folders->count() == 0 && $files->count() == 0) {
            if($standardFolder->delete()) {

                return true;
            }else {

                return response()->json(['message' => __("Something went wrong!")], 422);
            }
        }else {

            return response()->json(['message' => __("Can't delete this folder, it has folders/files")], 422);
        }
    }

    public function storeFile(Request $request)
    {
        $this->validateFile();

        if ($request->file('attachment')->isValid()) {

            $uploadedFile = $request->file('attachment')->store('public/standards');
            $file_name = str_replace("public/standards/", "", $uploadedFile);
            $type = $request->file('attachment')->extension();
            $size = Storage::disk('public')->size('standards/' . $file_name);
            $path = $uploadedFile;

            $file = new StandardFile(request([
                'standard_folder_id',
                'language_id',
                'title',
                'description',
                'file_name',
                'type',
                'path',
                'size'
            ]));

            $file->file_name = $file_name;
            $file->type = $type;
            $file->path = $path;
            $file->size = $size;
            $file->save();
  
        }
    }

    public function updateFile(Request $request, $id)
    {
        $standardFile = new StandardFile();
        $standardFile = $standardFile->find($id);

        $fields       = [];
        $uploadedFile = "";
        $file_name    = "";
        $type         = "";
        $size         = "";
        $path         = "";

        if($request->file('attachment')) {

            $status = Storage::disk('public')->delete('standards/' . $standardFile->file_name);

            if($status) {

                $uploadedFile = $request->file('attachment')->store('public/standards');
                $file_name    = str_replace("public/standards/", "", $uploadedFile);
                $type         = $request->file('attachment')->extension();
                $size         = Storage::disk('public')->size('standards/' . $file_name);
                $path         = $uploadedFile;

                $fields["file_name"] = $file_name;
                $fields["path"]      = $path;
                $fields["size"]      = $size;
                $fields["type"]      = $type;
            }

        }
        
        $this->validateEditFile();

        $fields["title"]       = $request->input("title");
        $fields["description"] = $request->input("description");
        $fields["language_id"] = $request->input("language_id");

        $standardFile->update($fields);
    }

    public function destroyFile($id)
    {
        $standardFile = new StandardFile();
        $standardFile = $standardFile->find($id);
        $status       = Storage::disk('public')->delete('standards/' . $standardFile->file_name);

        if($status) {
            
            $standardFile->delete();

            return true;
        }

        return response()->json(['message' => __("Something went wrong!")], 422);
    }

    public function sub_folders_files(int $folder_id) {

       
        $folder    = StandardFolder::find($folder_id);
        $folders   = StandardFolder::where('sub_standard_folder_id', $folder_id)->orderBy('sort')->get();
        $files     = StandardFile::where('standard_folder_id', $folder_id)->get();

        return view($this->path.'sub_standard_folders_files', compact('folder', 'folders', 'files'));
    }

    protected function validateFolder($request) {

        $checkSubFolder = $request->folder_id;

        $fields = [
            'title'                  => 'required',
            'title_en'               => 'nullable',
            'description'            => 'nullable',
            'description_en'         => 'nullable',
            'sub_standard_folder_id' => 'nullable'
        ];

        
        
        if($checkSubFolder == "0") {
            unset($fields['sub_folder_id']);
        }

        return request()->validate($fields);

    }

    protected function validateFile()
    {

        return request()->validate([
            'title'        => 'required',
            'language_id'  => 'required',
            'description'  => '',
            'attachment'   => 'required'
        ]);

    }

    protected function validateEditFile()
    {

        return request()->validate([
            'title'        => 'required',
            'language_id'  => 'required',
            'description'  => '',
            'attachment'   => ''
        ]);

    }
}

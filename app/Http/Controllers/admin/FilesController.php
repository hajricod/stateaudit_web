<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateFile();

        if ($request->file('attachment')->isValid()) {

            $uploadedFile = $request->file('attachment')->store('public/library');
            $file_name = str_replace("public/library/", "", $uploadedFile);
            $type = $request->file('attachment')->extension();
            $size = Storage::disk('public')->size('library/' . $file_name);
            $path = $uploadedFile;

            $file = new File(request([
                'folder_id',
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, File $file)
    {
        $folder_id = $request->id;
        $sub_folder_id = $request->sub_id;

        return view('admin.library.files.edit', compact('file', 'folder_id', 'sub_folder_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {

        $fields       = [];
        $uploadedFile = "";
        $file_name    = "";
        $type         = "";
        $size         = "";
        $path         = "";

        if($request->file('attachment')) {

            $status = Storage::disk('public')->delete('library/' . $file->file_name);

            if($status) {

                $uploadedFile = $request->file('attachment')->store('public/library');
                $file_name    = str_replace("public/library/", "", $uploadedFile);
                $type         = $request->file('attachment')->extension();
                $size         = Storage::disk('public')->size('library/' . $file_name);
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

        $file->update($fields);
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, File $file)
    {
        $status = Storage::disk('public')->delete('library/' . $file->file_name);

        if($status) {
            $file = File::find($file->id);
            $file->delete();

            return true;
        }

        return response()->json(['message' => __("Something went wrong!")], 422);

    }

    protected function validateFile()
    {

        return request()->validate([
            'title'        => 'required',
            'description'  => '',
            'attachment'   => 'required'
        ]);

    }

    protected function validateEditFile()
    {

        return request()->validate([
            'title'        => 'required',
            'description'  => '',
            'attachment'   => ''
        ]);

    }

    public function downloadFile($dir, $file)
    {

        return \Storage::disk('private')->download("$dir/$file");
    }
}

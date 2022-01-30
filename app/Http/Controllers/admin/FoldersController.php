<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;

class FoldersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $folder = new Folder($this->validateFolder($request));
        $folder->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Folder $folder)
    {
        $folder_id = $request->id;
        $sub_folder_id = $request->sub_id ? $request->sub_id : 0;
        return view('admin.library.folders.edit', compact('folder', 'folder_id', 'sub_folder_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        // dd($request);   
        $folder->update($this->validateFolder($request));
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Folder $folder)
    {

        $files     = $folder->files->count();
        $folders   = $folder->folders->count();
        if($folders == 0 && $files == 0) {
            if($folder->delete()) {

                return true;
            }else {

                return response()->json(['message' => __("Something went wrong!")], 422);
            }
        }else {

            return response()->json(['message' => __("Can't delete this folder, it has folders/files")], 422);
        }
        
    }

    protected function validateFolder($request) {

        $checkSubFolder = $request->folder_id;

        $fields = [
            'title'             => 'required',
            'title_en'          => 'nullable',
            'description'       => 'nullable',
            'description_en'    => 'nullable',
            'sub_folder_id'     => 'nullable'
        ];

        
        
        if($checkSubFolder == "0") {
            unset($fields['sub_folder_id']);
        }

        return request()->validate($fields);

    }
}

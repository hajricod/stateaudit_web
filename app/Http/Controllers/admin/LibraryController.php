<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\File;
use App\Models\Group;
use App\Models\Language;
use App\Models\Permission;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $userGroup   = Group::find(auth()->user()->group_id);
        $folders     = Folder::where('sub_folder_id', NULL)->get();
        $langauges   = Language::all();
        $groups      =  $userGroup->title == 'Admin' ? Group::all() : [$userGroup];
        $permissions = Permission::all();

        return view('admin.library.index', compact('folders', 'langauges', 'groups', 'permissions'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        
    }


    public function sub_folders_files(int $folder_id) {

        $folder    = Folder::find($folder_id);
        $folders   = Folder::where('sub_folder_id', '=', $folder_id)->get();
        $files     = File::where('folder_id', $folder_id)->get();

        return view('admin.library.sub_folders_files', compact('folder', 'folders', 'files'));
    }

}

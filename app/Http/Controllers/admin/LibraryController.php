<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\File;
use App\Models\Language;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $folders = "";
        // $files;
        // $folder_id     = $request->id;
        // $sub_folder_id = $request->sub_id != '' ? $request->sub_id : 0;
        // $folder_name = Folder::where('id', $folder_id)->pluck('title')->first();
        // $path = $request->path != "" ? $request->path . "/" .  $request->id : $folder_id;
        // $ids = array_unique(explode( '/', $path ));
        // $crump = "";
        // $crump = '<a href="/admin/library">المكتبة</a> / ';
        // $count = 0;

        // foreach ($ids as $id) {
        //     $count++;

        //     $linkTitle = Folder::where('id', $id)->pluck('title')->first();

        //     if($id == $folder_id){
        //         $crump .= $linkTitle . " / ";
        //     }else {
        //         $crump .= '<a href="/admin/library?id=' . $id . '&sub_id=' . $sub_folder_id . '&path=' . $path . '">' . $linkTitle. '</a> / ';
        //     }
        // }

        // $lastSlashPos = strrpos($crump, "/");

        // $crump = substr_replace($crump, "", $lastSlashPos);

        // if($sub_folder_id == null) {    
        //     $folders = Folder::whereNull('sub_folder_id')->paginate(10)->sortBy('title');
        // }else {
        //     $folders = Folder::where('sub_folder_id', '=', $folder_id)->paginate(20)->sortBy('title');
        // }

        // if($folder = Folder::where('id', $folder_id)->pluck('id')->first()) {
        //     $files = File::where('folder_id', $folder_id)->get();
        // }else {
        //     $files = File::whereNull('folder_id')->get();
        // }

        $folders   = Folder::where('sub_folder_id', NULL)->get();
        $langauges = Language::all();

        // $files   = File::all();

        //'files', 'folder_name', 'path', 'crump', 'sub_folder_id', 'folder_id'

        return view('admin.library.index', compact('folders', 'langauges'));
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

    public function back(Request $request) {
        
    }

    public function sub_folders_files(int $folder_id) {

        $folder    = Folder::find($folder_id);
        $folders   = Folder::where('sub_folder_id', '=', $folder_id)->get();
        $files     = File::where('folder_id', $folder_id)->get();

        return view('admin.library.sub_folders_files', compact('folder', 'folders', 'files'));
    }

}

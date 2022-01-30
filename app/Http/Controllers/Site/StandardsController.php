<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Standard;
use App\Models\StandardFile;
use App\Models\StandardFolder;
use Illuminate\Http\Request;


class StandardsController extends Controller
{
    public $path = 'site.standards.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $standardFolders = StandardFolder::where('sub_standard_folder_id', null)->orderBy('sort')->get();
        $languages       = Language::all();
        
        return view($this->path.'index', compact('standardFolders', 'languages'));
    }

    public function sub_folders_files(int $folder_id) {
        
        $folder    = StandardFolder::find($folder_id);
        $folders   = StandardFolder::where('sub_standard_folder_id', $folder_id)->orderBy('sort')->get();
        $files     = StandardFile::where('standard_folder_id', $folder_id)->get();

        return view($this->path.'sub_standard_folders_files', compact('folder', 'folders', 'files'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(Standard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function edit(Standard $standard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standard $standard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Standard  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standard $standard)
    {
        //
    }
}

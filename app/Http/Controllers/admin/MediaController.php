<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Media;
use App\Models\MediaFile;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Models\ProgramList;
use App\Models\Video;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        checkPermission('media.view');

        $categories = ProgramCategory::all();

        return view('admin.media.index', compact('categories'));
    }

    public function sections(int $id)
    {
        checkPermission('media.view');

        $title    = ProgramCategory::where('id', $id)->get()->pluck('title')[0];
        $programs = Program::where('program_cate_id',$id)->get();

        return view('admin.media.sections', compact('programs', 'title'));
    }

    public function list(int $id)
    {
        checkPermission('media.view');

        $program = Program::find($id);
        $list    = Program::find($id)->list;

        return view('admin.media.list', compact('list', 'program'));
    }

    public function videos(int $prog_id = null, int $list_id = null, Request $request)
    {
        checkPermission('media.view');

        // which program ?
        $program = Program::find($prog_id);

        // get the list
        $list = ProgramList::where('id', $list_id)->get()->first();

        $videos = Video::where('program_id', $prog_id)->paginate(10);

        // some programs have a list
        if($list) {
            $videos = Video::where('program_list', $list_id)->paginate(10);
        }

        return view('admin.media.videos', compact('list', 'program', 'videos'));
    }

    public function audio(int $prog_id = null) {

        checkPermission('media.view');

        $program = Program::find($prog_id);
        $audios  = Audio::where('program_id', $prog_id)->paginate(10);

        return view('admin.media.audios', compact('program', 'audios'));
    }

    public function files(int $prog_id = null) {

        checkPermission('media.view');

        $program = Program::find($prog_id);
        $files  = MediaFile::where('program_id', $prog_id)->paginate(10);

        return view('admin.media.files', compact('program', 'files'));
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
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramList;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
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
    public function create(Request $request)
    {
        $list = null;
        $program_id = null;

        if($request->list) {

            $list        = ProgramList::where('id', $request->list)->get()->first();
            $latestVideo = Video::where('program_list', $request->list)->get()->last();

        } else {

            $latestVideo = Video::where('program_id', $request->id)->get()->last();

            $program_id = $request->id;
        }
        
        return view('admin.media.videos.create', compact('list', 'latestVideo', 'program_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Video $video)
    {
        $list_id = $request->input('program_list');
        $prog_id = $request->input('program_id');

        $video->create($this->validateVideo());

        if($list_id) {

            $list    = ProgramList::find($list_id); 
            $program = Program::find($list->program_id);

            return redirect('/admin/media/videos/'.$program->id .'/'.$list->id);

        } else {

            return redirect('/admin/media/videos/'.$prog_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $program = '';
        $lists = [];
        $currentList = '';
        $prog_id = $video->getAttribute('program_id');
        $list_id = $video->getAttribute('program_list');

        if($prog_id) {

            $program = Program::find($prog_id);

            $currentList = ProgramList::where('program_id', $prog_id)->get();

        }else {

            $currentList = ProgramList::find($list_id);

            $program = Program::find($currentList->program_id);

            $lists = ProgramList::where('program_id', $program->id)->get();
        }

        return view('admin.media.videos.edit', compact('program', 'lists', 'currentList', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $list_id    = $request->input('program_list');
        $prog_id    = $request->input('program_id');

        $video->update($this->validateVideo());

        if($list_id) {

            $list    = ProgramList::find($list_id); 
            $program = Program::find($list->program_id);

            return redirect('/admin/media/videos/'.$program->id .'/'.$list->id);

        } else {

            return redirect('/admin/media/videos/'.$prog_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        
        return redirect(url()->previous());
    }

    protected function validateVideo()
    {

        return request()->validate([
            'program_id'   => '',
            'program_list' => '',
            'title'        => 'required',
            'rank'         => 'required',
            'description'  => 'max:1000',
            'url'          => 'required',
            'created_at'   => 'required',
        ]);

    }

}

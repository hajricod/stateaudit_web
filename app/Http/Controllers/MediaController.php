<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\MediaFile;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Models\ProgramList;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programCategories = ProgramCategory::all();
        $programCategoriesLists = [];
        $programs = [];

        foreach ($programCategories as $programCate) {
            $list = ProgramCategory::find($programCate->id)->programs;

            foreach ($list as $item) {
                $programs[] = $item->getAttributes();
            }

            $programCategoriesLists [] = [
                "cate" => $programCate->getAttributes(),
                "list" => $programs
            ];

            $programs = [];
        }

        return view('media.index', compact('programCategories', 'programCategoriesLists'));
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

    public function list($id) {

        $lists = ProgramList::where('program_id', $id)->get();
        // $title = Program::where('id', $id)->get()->pluck('title')[0];
        $program = Program::find($id);

        return view('media.list', compact('lists', 'program'));
    }

    public function videos(int $prog_id = null, int $list_id = null, Request $request)
    {
        // which program ?
        $program = Program::find($prog_id);

        // get the list
        $list = ProgramList::where('id', $list_id)->get()->first();

        $videos = Video::where('program_id', $prog_id)->paginate(10);

        // some programs have a list
        if($list) {
            $videos = Video::where('program_list', $list_id)->paginate(10);
        }

        return view('media.videos', compact('list', 'program', 'videos'));
    }

    public function videosByYear(int $prog_id = null, int $year = null, Request $request)
    {
        $list = [];
        
        $program = Program::find($prog_id);

        $videos = Video::where([
                            ['program_id', $prog_id],
                            ['created_at', 'like', '%'.$year.'%']
                        ])
                        ->paginate(10);

        // $content = Video::where('program_id', $prog_id)->get();
        // $videos = $content->where('created_at', 'like', '%'.$year.'%')->paginate(10);

        return view('media.videos', compact('list', 'program', 'videos'));
    }

    public function years(int $prog_id)
    {
        $program = Program::find($prog_id);
        $lists   = Video::where('program_id', $prog_id)->get()->pluck('created_at');

        $years = $lists->map(function ($item) {
            return $item->format('Y');
        })->unique();


        return view('media.years', compact('prog_id', 'years', 'program'));
    }

    public function files(int $prog_id = null) {

        $program = Program::find($prog_id);
        $files   = MediaFile::where('program_id', $prog_id)->paginate(10);

        return view('media.files', compact('program', 'files'));
    }
}

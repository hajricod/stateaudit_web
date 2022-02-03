<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Media;
use App\Models\MediaEvent;
use App\Models\MediaFile;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Models\ProgramList;
use App\Models\Video;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public $path = 'site.media.';
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

        return view($this->path.'index', compact('programCategories', 'programCategoriesLists'));
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

        return view($this->path.'list', compact('lists', 'program'));
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

        return view($this->path.'videos', compact('list', 'program', 'videos', 'prog_id', 'list_id'));
    }

    public function videosByYear(int $prog_id = null, int $year = null, Request $request)
    {
        $list = [];
        $list_id = null;
        
        $program = Program::find($prog_id);

        $videos = Video::where([
            ['program_id', $prog_id],
            ['created_at', 'like', '%'.$year.'%']
        ])
        ->paginate(10);

        return view($this->path.'videos', compact('list', 'program', 'videos', 'prog_id', 'list_id'));
    }

    public function years(int $prog_id)
    {
        $program = Program::find($prog_id);
        $lists   = Video::where('program_id', $prog_id)->get()->pluck('created_at');

        $years = $lists->map(function ($item) {
            return $item->format('Y');
        })->unique();


        return view($this->path.'years', compact('prog_id', 'years', 'program'));
    }

    public function files(int $prog_id = null) {

        $program = Program::find($prog_id);
        $files   = MediaFile::where('program_id', $prog_id)->paginate(10);

        return view($this->path.'files', compact('program', 'files'));
    }

    public function mevents()
    {
        $events = MediaEvent::all();

        $data = [];

        foreach ($events as $event) {

            $data[] = [
                'title'  => lang() == 'ar'? $event->title : $event->title_en,
                'start'  => $event->start_on,
                'end'    => $event->end_on,
                'allDay' => $event->allday == 1? true: false
            ];
        }

        $data = JSON_ENCODE($data, JSON_UNESCAPED_UNICODE);

        return view($this->path.'events', compact('data'));
    }

    public function audios(int $prog_id = null) {

        $program = Program::find($prog_id);
        
        $audios  = Audio::where('program_id', $prog_id)->paginate(10);

        return view($this->path.'audios', compact('program', 'audios'));
    }
}

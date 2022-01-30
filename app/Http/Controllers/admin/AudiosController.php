<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Group;

class AudiosController extends Controller
{
    public function isAuthorized() {

        $group = Group::find(Auth::user()->group_id);

        if (Gate::denies('group-media', $group)) {

            abort(403);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->isAuthorized();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->isAuthorized();

        $program_id  = $request->id;
        $latestAudio = Audio::where('program_id', $program_id)->get()->last();

        return view('admin.media.audios.create', compact('latestAudio', 'program_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Audio $audio)
    {
        $this->isAuthorized();

        $this->validateAudio();

        $fileName = $this->uploadFile($request->file('file'));

        $audio = new Audio(request([
            'program_id',
            'title',
            'rank',     
            'description',
            'file',
            'created_at' 
        ]));

        $audio->file = $fileName;

        $audio->save();

        return redirect("/admin/media/audios/".$request->program_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        $this->isAuthorized();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        $this->isAuthorized();

        return view('admin.media.audios.edit', compact('audio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audio $audio)
    {
        $this->isAuthorized();

        $this->validateAudioEdit();

        $file        = $request->file('file');
        $file_status = false;
        $file_title  = null;

        $file ? $file_status = $this->deleteFile($audio) : '';

        $file_status ? $file_title = $this->uploadFile($request->file('file')): '';

        $fields = [
            "title"       => $request->title,
            "description" => $request->description,
            "rank"        => $request->rank,
            "created_at"  => $request->created_at
        ];

        $file_title ? $fields['file'] = $file_title : '';


        if($audio->update($fields)) {
            
            return redirect('/admin/media/audios/'.$audio->program_id)->with('message', __('Details were updated successfully!'));
        }
        
        return redirect('/admin/media/audios/'.$audio->program_id)->with('message', __('Something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        $this->isAuthorized();

        if($this->deleteFile($audio)) {
            
            if($audio->delete()) {

                return redirect('/admin/media/audios/'.$audio->program_id)->with('message', __('Record was deleted!'));
            }
        }
        
        return redirect('/admin/media/audios/'.$audio->program_id)->with('message', __('Something went wrong!'));
    }

    protected function validateAudio()
    {

        return request()->validate([
            // 'program_id'   => 'required',
            'title'        => 'required',
            'rank'         => 'required',
            'description'  => 'max:1000',
            'file'         => 'required', //|mimes:m4a,mp4a,mp3',
            'created_at'   => 'required',
        ]);

    }

    protected function validateAudioEdit()
    {

        return request()->validate([
            // 'program_id'   => 'required',
            'title'        => 'required',
            'rank'         => 'required',
            'description'  => 'max:1000',
            'file'         => '',
            'created_at'   => 'required',
        ]);
        
    }

    protected function uploadFile($file) 
    {

        $fileName = $file->store('public/audio');

        $correct_filename = str_replace("public/audio/", "", $fileName);

        return $correct_filename;

    }

    protected function deleteFile($audio) 
    {

        $status = Storage::disk('public')->delete("audio/" . $audio->file);

        return $status;
    }
}

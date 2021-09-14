<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MediaFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Models\Group;

class MediaFilesController extends Controller
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
        $program_id  = $request->id;
        $latestFile  = MediaFile::where('program_id', $program_id)->get()->last();

        return view('admin.media.files.create', compact('latestFile', 'program_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MediaFile $media_file)
    {
        $this->isAuthorized();

        $this->validateFile();

        $fileName = $this->uploadFile($request->file('file'));

        $media_file = new MediaFile(request([
            'program_id',
            'title',
            'rank',     
            'description',
            'file',
            'created_at' 
        ]));

        $media_file->file = $fileName;

        $media_file->save();

        return redirect("/admin/media/files/".$request->program_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function show(MediaFile $mediaFile)
    {
        $this->isAuthorized();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaFile $mediaFile)
    {
        $this->isAuthorized();

        return view('admin.media.files.edit', compact('mediaFile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaFile $mediaFile)
    {
        $this->isAuthorized();

        $this->validateFileEdit();

        $file        = $request->file('file');
        $file_status = false;
        $file_title  = null;

        $file ? $file_status = $this->deleteFile($mediaFile) : '';

        $file_status ? $file_title = $this->uploadFile($request->file('file')): '';

        $fields = [
            "title"       => $request->title,
            "description" => $request->description,
            "rank"        => $request->rank,
            "created_at"  => $request->created_at
        ];

        $file_title ? $fields['file'] = $file_title : '';


        if($mediaFile->update($fields)) {
            
            return redirect('/admin/media/files/'.$mediaFile->program_id)->with('message', __('Details were updated successfully!'));
        }
        
        return redirect('/admin/media/files/'.$mediaFile->program_id)->with('message', __('Something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaFile  $mediaFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaFile $mediaFile)
    {
        $this->isAuthorized();

        if($this->deleteFile($mediaFile)) {
            
            if($mediaFile->delete()) {

                return redirect('/admin/media/files/'.$mediaFile->program_id)->with('message', __('Record was deleted!'));
            }
        }
        
        return redirect('/admin/media/files/'.$mediaFile->program_id)->with('message', __('Something went wrong!'));
    }

    protected function validateFile()
    {

        return request()->validate([
            'title'        => 'required',
            'rank'         => 'required',
            'description'  => 'max:1000',
            'file'         => 'required', //|mimes:m4a,mp4a,mp3',
            'created_at'   => 'required',
        ]);

    }

    protected function validateFileEdit()
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

        $this->isAuthorized();

        $fileName = $file->store('public/files');

        $correct_filename = str_replace("public/files/", "", $fileName);

        return $correct_filename;

    }

    protected function deleteFile($audio) 
    {
        $this->isAuthorized();    
        
        $status = Storage::disk('public')->delete("files/" . $audio->file);

        return $status;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaEvent;
use Illuminate\Http\Request;

class MediaEventsController extends Controller
{
    public $path = 'admin.media.events.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        checkPermission('media.view');

        return view($this->path.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        checkPermission('media.add');

        return view($this->path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MediaEvent $mediaEvent)
    {
        checkPermission('media.add');

        if ($mediaEvent->create($this->validateMediaEvent()));
            return redirect('/admin/media_events')->with('message', __('Recored was added!'));
        
        return redirect('/admin/media_events')->with('message', __('Something went wrong!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaEvent  $mediaEvent
     * @return \Illuminate\Http\Response
     */
    public function show(MediaEvent $mediaEvent)
    {
        checkPermission('media.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaEvent  $mediaEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaEvent $mediaEvent)
    {

        checkPermission('media.update');

        $event = $mediaEvent;

        return view($this->path.'edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaEvent  $mediaEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaEvent $mediaEvent)
    {
        checkPermission('media.update');

        if ($mediaEvent->update($this->validateMediaEvent()));
            return redirect('/admin/media_events')->with('message', __('Details were updated successfully!'));
        
        return redirect('/admin/media_events')->with('message', __('Something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaEvent  $mediaEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaEvent $mediaEvent)
    {
        checkPermission('media.delete');

        $mediaEvent->delete();

    }

    protected function validateMediaEvent()
    {

        return request()->validate([
            'title'        => 'required',
            'title_en'     => 'required',
            'start_on'     => 'required|date',
            'end_on'       => 'required|date',
        ]);

    }
}

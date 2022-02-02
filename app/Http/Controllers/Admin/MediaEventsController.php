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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        checkPermission('media.add');
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

    }
}

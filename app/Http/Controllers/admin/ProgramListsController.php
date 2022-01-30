<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramList;
use Illuminate\Http\Request;

class ProgramListsController extends Controller
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
        $id = $request->id;

        return view('admin.media.lists.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProgramList $programList)
    {

        // $programList->create(
        //     $request->validate([
        //         'title'        => 'required',
        //         'program_id'   => 'required'
        //     ])
        // );

        return redirect('/admin/media/list/'.$request->program_id)->with('message', __('Recored was added!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramList  $programList
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramList $programList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramList  $programList
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramList $programList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramList  $programList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramList $programList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramList  $programList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramList $programList)
    {
        //
    }
}

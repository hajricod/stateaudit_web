<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public $path = 'admin.branches.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::orderBy('sort')->get();

        return view($this->path.'index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = Branch::latest()->first();

        return view($this->path.'create', compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Branch $branch)
    {
        $this->validateBranch();

        $request->input('status')    ? $status    = 1 : 0;
        !$request->input('status')   ? $status    = 0 : 1;

        $fields = [
            'title'       => $request->input('title'),
            'title_en'    => $request->input('title_en'),
            'status'      => $status,
            'sort'        => $request->input('sort'),
            'url'         => $request->input('url'),
            'longitude'   => $request->input('longitude'),
            'latitude'    => $request->input('latitude'),
        ];
        
        $branch->create($fields);

        return back()->with('message', __('was sent successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view($this->path.'edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $this->validateBranch();

        $request->input('status')    ? $status    = 1 : 0;
        !$request->input('status')   ? $status    = 0 : 1;

        $fields = [
            'title'       => $request->input('title'),
            'title_en'    => $request->input('title_en'),
            'status'      => $status,
            'sort'        => $request->input('sort'),
            'url'         => $request->input('url'),
            'longitude'   => $request->input('longitude'),
            'latitude'    => $request->input('latitude'),
        ];
        
        $branch->update($fields);

        return redirect('admin/branches')->with('message', __('Details were updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        if($branch->delete()) {
            return redirect('admin/branches')->with('message', __('Record was deleted!'));
        }
    }

    public function validateBranch() {
        return request()->validate([
            'title'     => 'required',
            'title_en'  => 'required',
            'url'       => 'nullable',
            'longitude' => 'nullable',
            'latitude'  => 'nullable',
            'status'    => 'nullable'
        ]);
    }
}

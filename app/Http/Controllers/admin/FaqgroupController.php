<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faqgroup;
use Illuminate\Http\Request;

class FaqgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqgroups = Faqgroup::all();

        return view('admin.faqgroup.index', compact('faqgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqgroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faqgroup $faqgroup)
    {
        $faqgroup->create($this->validateFaqgroup());

        return back()->with('message', __('was sent successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faqgroup  $faqgroup
     * @return \Illuminate\Http\Response
     */
    public function show(Faqgroup $faqgroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faqgroup  $faqgroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqgroup $faqgroup)
    {
        return view('admin.faqgroup.edit', compact('faqgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faqgroup  $faqgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faqgroup $faqgroup)
    {
        $faqgroup->update($this->validateFaqgroup());

        return back()->with('message', __('Details were updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faqgroup  $faqgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faqgroup $faqgroup)
    {
        $faqgroup->delete();

        return redirect('/admin/faqgroup')->with('message', __('Record was deleted!'));
    }

    protected function validateFaqgroup() {

        return request()->validate([
            'title'      => 'required|max:255',
            'title_en'   => 'max:255',
            'rank'       => 'required',
        ]);

    }
}

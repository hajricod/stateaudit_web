<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqGroup;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqgroups  = FaqGroup::all();
        $faqs       = Faq::all();

        return view('admin.faq.index', compact('faqgroups', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faqgroups = FaqGroup::all();
        return view('admin.faq.create', compact('faqgroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faq $faq)
    {
        $faq->create($this->validateFaq());

        return back()->with('message', __('was sent successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $faqgroups = FaqGroup::all();

        return view('admin.faq.edit', compact('faqgroups', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $faq->update($this->validateFaq());

        return back()->with('message', __('Details were updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return back()->with('message', __('Record was deleted!'));
    }

    protected function validateFaq() {

        return request()->validate([
            'question'      => 'required|max:500',
            'question_en'   => 'max:500',
            'rank'          => 'required',
            'faq_group_id'  => 'required',
            'answer'        => 'required',
            'answer_en'     => ''
        ]);

    }
}

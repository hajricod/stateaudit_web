<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PromotionsController extends Controller
{
    protected function isAuthorized() {

        $group = Group::find(Auth::user()->group_id);

        if (Gate::denies('group-promotion', $group)) {

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
        // $promotions = Promotion::orderBy('created_at', 'desc')->paginate(10)->onEachSide(1);
        return view('admin.promotions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isAuthorized();
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isAuthorized();
        $this->validatePromotion();

        $fileName = $this->uploadFile($request->file('attachment'));

        $promotion = new Promotion(request([
            'title',
            'description',
            'attachment',
            'start_on',
            'end_on'
        ]));

        $promotion->attachment = $fileName;

        $promotion->save();
            
        return redirect('/admin/promotions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        return view('admin.promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $this->isAuthorized();
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $this->isAuthorized();
        $this->validatePromotionEdit();

        $file = $request->file('attachment');
        $file_status = false;
        $file_title = null;

        $file ? $file_status = $this->deleteFile($promotion) : '';

        $file_status ? $file_title = $this->uploadFile($request->file('attachment')): '';

        $file_title ? $promotion->attachment = $file_title : '';

        if($promotion->update()) {
            
            return redirect('/admin/promotions')->with('message', __('Details were updated successfully!'));
        }
        
        return redirect('/admin/promotions')->with('message', __('Something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $this->isAuthorized();

        $file_status = $this->deleteFile($promotion);

        if($file_status) {

            $promotion->delete();
        }

    }

    protected function validatePromotion()
    {

        return request()->validate([
            'title'        => 'required',
            'description'  => 'required',
            'attachment'   => 'required|max:5048',
            'start_on'     => 'required|date|before:end_on',
            'end_on'       => 'required|date|after:start_on',
        ]);

    }

    protected function validatePromotionEdit()
    {

        return request()->validate([
            'title'        => 'required',
            'description'  => 'required',
            'attachment'   => 'max:5048',
            'start_on'     => 'required|date|before:end_on',
            'end_on'       => 'required|date|after:start_on',
        ]);

    }

    protected function uploadFile($file) 
    {

        $this->isAuthorized();

        $fileName = $file->store('private/promotions');

        $correct_filename = str_replace("private/promotions/", "", $fileName);

        return $correct_filename;

    }

    protected function deleteFile($promotion) 
    {
        $this->isAuthorized();    
        $status = Storage::disk('private')->delete("promotions/" . $promotion->attachment);

        return $status;
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax()) {
            $sort_by = $request->get('sortby') ? $request->get('sortby') : 'created_at';
            $sort_type = $request->get('sorttype') ? $request->get('sorttype') : 'description';
            $per_page = $request->get('perpage') ? $request->get('perpage') : 10;
            $search = str_replace(" ", "%", $request->get('search'));
            $promotions = Promotion::
            where('title', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', '%'.$search.'%')
            ->orderBy($sort_by, $sort_type)
            ->paginate($per_page)
            ->onEachSide(1);
            return view('admin.promotions.data', compact('promotions'));
        }
    }
}

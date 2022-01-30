<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\FooterCategory;
use App\Models\FooterLink;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cate_id = FooterCategory::orderBy('sort')->first()->id;
        $request->id ? $cate_id = $request->id : $cate_id;

        $footerCategories = FooterCategory::orderBy('sort')->get();
        $footerLinks = FooterLink::orderBy('sort')->where('footer_cate_id', $cate_id)->get();

        return view('admin.settings.footer.index', compact('footerCategories', 'footerLinks', 'cate_id'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $id =$request->id;
        // $cate_id =$request->footer_cate_id;

        // if($cate_id) {
        //     $footerLinks = FooterLink::where('id', $request->id)->get();
        //     $this->validateLink($footerLinks);
        //     FooterLink::where('id', $id)->update([
        //         "title" => $request->title,
        //         "title_en" => $request->title_en,
        //         "url" => $request->url
        //     ]);

        //     // return back()->with('message', __('Details were updated successfully!'));
        //     return redirect('/admin/footer?id=' . $cate_id . '')->with('message', __('Details were updated successfully!'));
            
        // }else {
        //     $footerCategory = FooterCategory::where('id', $request->id)->get();
        //     $this->validateCate($footerCategory);
        //     FooterCategory::where('id', $request->id)->update([
        //         "title" => $request->title,
        //         "title_en" => $request->title_en
        //     ]);

        //     // return back()->with('message', __('Details were updated successfully!'));
        //     return redirect('/admin/footer?id=' . $id . '')->with('message', __('Details were updated successfully!'));
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validateCate()
    {

        return request()->validate([
            'title'          => 'required',
            'title_en'       => 'required',
            'status'         => 'nullable',
            'sort'           => 'required',
        ]);

    }

    protected function validateLink()
    {

        return request()->validate([
            'title'          => 'required',
            'title_en'       => 'required',
            'footer_cate_id' => 'required',
            'url'            => 'required',
            'status'         => 'nullable',
            'sort'           => 'required',
            'show_text'      => 'nullable',
            'icon'           => 'nullable'
        ]);

    }

    public function footerLinks(Request $request) {
        if($request->ajax()) {
            $id = $request->id;
            $footerLinks = FooterLink::where('footer_cate_id', $id)->orderBy('sort')->get();

            return view('admin.settings.footer.links', compact('footerLinks'));
        }
    }

    public function updateFooterLinks(Request $request, int $id) {
        
        if($request->ajax()) {      

            $footerLink = FooterCategory::find($id);

            $this->validateCate();

            $status = 0;

            $request->input('status')    ? $status    = 1 : 0;
            !$request->input('status')   ? $status    = 0 : 1;

            $fields = [
                'title'          => $request->input('title'),
                'title_en'       => $request->input('title_en'),
                'status'         => $status,
                'sort'           => $request->input('sort'),
            ];

            if($footerLink->update($fields)) {

                return response()->json(['success'=> __('Details were updated successfully!')]);
            }

            return response()->json(['fail'=> __('Something went wrong!')], 422);
        }
    }

    public function deleteFooterLink(Request $request, int $id) {
        
        if($request->ajax()) {      

            $footerLink     = FooterCategory::find($id);
            $footerSublinks = FooterLink::where("footer_cate_id", $footerLink->id)->get();

            if(count($footerSublinks) > 0) {

                return response()->json(['fail'=> __('Not possible to delete this record, it\'s linked with another record!')], 422);
                
            }else {
                
                if($footerLink->delete()) {

                    return response()->json(['success'=> __('Record was deleted!')]);
                }
            }

            return response()->json(['fail'=> __('Something went wrong!')], 422);
        }
    }

    public function deleteFooterSublink(Request $request, int $id) {
        
        if($request->ajax()) {      

            $footerSublink     = FooterLink::find($id);
                
            if($footerSublink->delete()) {

                return response()->json(['success'=> __('Record was deleted!')]);
            }
            
            return response()->json(['fail'=> __('Something went wrong!')], 422);
        }
    }

    public function updateFooterSublinks(Request $request, int $id) {
        
        if($request->ajax()) {  

            $footerSublink = FooterLink::findOrFail($id);

            $this->validateLink();

            $status = 0;
            $showTitle = 0;

            $request->input('status')        ? $status    = 1 : 0;
            !$request->input('status')       ? $status    = 0 : 1;
            $request->input('show_title')    ? $showTitle = 1 : 0;
            !$request->input('show_title')   ? $showTitle = 0 : 1;

            $fields = [
                'title'          => $request->input('title'),
                'title_en'       => $request->input('title_en'),
                'url'            => $request->input('url'),
                'status'         => $status,
                'show_title'     => $showTitle,
                'sort'           => $request->input('sort'),
                'footer_cate_id' => $request->input('footer_cate_id'),
                'icon'           => $request->input('icon')
            ];

            if($footerSublink->update($fields)) {
                
                return response()->json(['success'=> __('Details were updated successfully!')]);
            }

        }

        return response()->json(['fail'=> __('Something went wrong!')], 422);
    }

    public function addFooterlink(Request $request) {
        
        if($request->ajax()) {
            
            $footer_cate_id = $request->footer_cate_id;

            if ($footer_cate_id) {

                $footerCategory = FooterCategory::find($footer_cate_id);

                if (FooterCategory::find($footer_cate_id)) {

                    $footerLink = new FooterLink();

                    $this->validateLink();

                    $status = 0;
                    $showTitle = 0;

                    $request->input('status')        ? $status    = 1 : 0;
                    !$request->input('status')       ? $status    = 0 : 1;
                    $request->input('show_title')    ? $showTitle = 1 : 0;
                    !$request->input('show_title')   ? $showTitle = 0 : 1;

                    $fields = [
                        'title'          => $request->input('title'),
                        'title_en'       => $request->input('title_en'),
                        'url'            => $request->input('url'),
                        'status'         => $status,
                        'show_title'     => $showTitle,
                        'sort'           => $request->input('sort'),
                        'footer_cate_id' => $request->input('footer_cate_id'),
                        'icon'           => $request->input('icon')
                    ];

                    $footerLink->create($fields);
                    
                    return response()->json(['success'=> __('Recored was added!')]);
                    
                }
               
                return response()->json(['fail'=> __('Something went wrong!')], 422);
                
            } else {

                $footerCategory = new FooterCategory();

                $this->validateCate();

                $status = 0;

                $request->input('status')    ? $status    = 1 : 0;
                !$request->input('status')   ? $status    = 0 : 1;

                $fields = [
                    'title'          => $request->input('title'),
                    'title_en'       => $request->input('title_en'),
                    'status'         => $status,
                    'sort'           => $request->input('sort'),
                ];

                if ($footerCategory->create($fields)) {

                    return response()->json(['success'=> __('Recored was added!')]);
                }
            }

        }

        return response()->json(['fail'=> __('Something went wrong!')], 422);
    }
}

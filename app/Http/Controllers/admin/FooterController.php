<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\FooterCategory;
use App\Models\FooterLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cate_id = DB::table('footer_categories')->orderBy('created_at', 'desc')->first()->id;
        $request->id ? $cate_id = $request->id : $cate_id;

        $footerCategories = DB::table('footer_categories')->orderBy('created_at', 'desc')->get();
        $footerLinks = DB::table('footer_Links')->orderBy('created_at', 'desc')->where('footer_cate_id', $cate_id)->get();

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
        $id =$request->id;
        $cate_id =$request->footer_cate_id;

        if($cate_id) {
            $footerLinks = DB::table('footer_links')->where('id', $request->id)->get();
            $this->validateLink($footerLinks);
            DB::table('footer_links')->where('id', $id)->update([
                "title" => $request->title,
                "title_en" => $request->title_en,
                "url" => $request->url
            ]);

            // return back()->with('message', __('Details were updated successfully!'));
            return redirect('/admin/footer?id=' . $cate_id . '')->with('message', __('Details were updated successfully!'));
            
        }else {
            $footerCategory = DB::table('footer_categories')->where('id', $request->id)->get();
            $this->validateCate($footerCategory);
            DB::table('footer_categories')->where('id', $request->id)->update([
                "title" => $request->title,
                "title_en" => $request->title_en
            ]);

            // return back()->with('message', __('Details were updated successfully!'));
            return redirect('/admin/footer?id=' . $id . '')->with('message', __('Details were updated successfully!'));
        }
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
            'created_at'     => Carbon::now(),
        ]);

    }

    protected function validateLink()
    {

        return request()->validate([
            'title'          => 'required',
            'title_en'       => 'required',
            'footer_cate_id' => 'required',
            'url'            => 'required',
            'created_at'     => Carbon::now(),
        ]);

    }

    public function footerLinks(Request $request) {
        if($request->ajax()) {
            $id = $request->id;
            $footerLinks = DB::table('footer_links')->where('footer_cate_id', $id)->orderBy('created_at', 'desc')->get();

            return view('admin.settings.footer.links', compact('footerLinks'));
        }
    }

    public function updateFooterLinks(Request $request, int $id) {
        
        if($request->ajax()) {      

            $footerLink = FooterCategory::find($id);

            if($footerLink->update($this->validateCate())) {

                return response()->json(['success'=> __('Details were updated successfully!')]);
            }

            return response()->json(['fail'=> __('Something went wrong!')], 422);
        }
    }

    public function deleteFooterLink(Request $request, int $id) {
        
        if($request->ajax()) {      

            $footerLink     = FooterCategory::find($id);
            $footerSublinks = FooterLink::where("footer_cate_id", $footerLink->id)->get();

            // dd($footerSublinks);

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

            if($footerSublink->update($this->validateLink())) {
                
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

                    $footerLink->create($this->validateLink());
                    
                    return response()->json(['success'=> __('Recored was added!')]);
                    
                }
               
                return response()->json(['fail'=> __('Something went wrong!')], 422);
                
            } else {

                $footerCategory = new FooterCategory();

                if ($footerCategory->create($this->validateCate())) {

                    return response()->json(['success'=> __('Recored was added!')]);
                }
            }

        }

        return response()->json(['fail'=> __('Something went wrong!')], 422);
    }
}

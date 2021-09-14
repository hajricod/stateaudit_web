<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderLink;
use App\Models\HeaderSublink;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $link_id = DB::table('header_links')->orderBy('created_at', 'desc')->first()->id;
        $request->id ? $link_id = $request->id : $link_id;

        $headerLinks = DB::table('header_links')->orderBy('created_at', 'desc')->get();
        $headerSublinks = DB::table('header_sublinks')->orderBy('created_at', 'desc')->where('header_links_id', $link_id)->get();

        return view('admin.settings.header.index', compact('headerLinks', 'headerSublinks', 'link_id'));
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
        $link_id =$request->header_links_id;

        if($link_id) {
            $headerSublinks = DB::table('header_sublinks')->where('id', $request->id)->get();
            $this->validateSublink($headerSublinks);
            DB::table('header_sublinks')->where('id', $id)->update([
                "title" => $request->title,
                "title_en" => $request->title_en,
                "url" => $request->url
            ]);

            // return back()->with('message', __('Details were updated successfully!'));
            // return redirect('/admin/header?id=' . $link_id . '')->with('message', __('Details were updated successfully!'));
            return response()->json(['success'=>'Form is successfully submitted!']);
            
        }else {
            $headerLinks = DB::table('header_links')->where('id', $request->id)->get();
            $this->validateLink($headerLinks);
            DB::table('header_links')->where('id', $request->id)->update([
                "title" => $request->title,
                "title_en" => $request->title_en,
                "url" => $request->url
            ]);

            // return back()->with('message', __('Details were updated successfully!'));
            // return redirect('/admin/header?id=' . $id . '')->with('message', __('Details were updated successfully!'));
            return response()->json(['success'=>'Form is successfully submitted!']);
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

    protected function validateLink()
    {

        return request()->validate([
            'title'        => 'required',
            'title_en'     => 'required',
            'url'          => 'required',
            'created_at'   => Carbon::now(),
        ]);

    }

    protected function validateSublink()
    {

        return request()->validate([
            'title'           => 'required',
            'title_en'        => 'required',
            'header_links_id' => 'required',
            'url'             => 'required',
            'created_at'      => Carbon::now(),
        ]);

    }

    public function headerSublinks(Request $request) {
        if($request->ajax()) {
            $id = $request->id;
            $headerSublinks = DB::table('header_sublinks')->where('header_links_id', $id)->orderBy('created_at', 'desc')->get();

            return view('admin.settings.header.links', compact('headerSublinks'));
        }
    }

    public function deleteHeaderLink(Request $request, int $id) {
        
        if($request->ajax()) {      

            $headerLink     = HeaderLink::find($id);
            $headerSublinks = headerSublink::where("header_links_id", $headerLink->id)->get();

            if(count($headerSublinks) > 0) {

                return response()->json(['fail'=> __('Not possible to delete this record, it\'s linked with another record!')], 422);
                
            }else {
                
                if($headerLink->delete()) {

                    return response()->json(['success'=> __('Record was deleted!')]);
                }
            }

            return response()->json(['fail'=> __('Something went wrong!')], 422);
        }
    }

    public function deleteHeaderSublink(Request $request, int $id) {
        
        if($request->ajax()) {      

            $headerSublink     = HeaderSublink::find($id);
                
            if($headerSublink->delete()) {

                return response()->json(['success'=> __('Record was deleted!')]);
            }
            
            return response()->json(['fail'=> __('Something went wrong!')], 422);
        }
    }

    public function updateHeaderLinks(Request $request, int $id) {
        
        if($request->ajax()) {            
            $headerLink = HeaderLink::find($id);

            if($headerLink->update($this->validateLink())) {

                return response()->json(['success'=> __('Details were updated successfully!')]);
            }

            return response()->json(['fail'=> __('Something went wrong!')]);
        }
    }

    public function updateHeaderSublinks(Request $request, int $id) {
        
        if($request->ajax()) {  

            $headerSublink = HeaderSublink::findOrFail($id);
            $headerSublink->update($this->validateSublink());

            if($headerSublink->update($this->validateSublink())) {
                
                return response()->json(['success'=> __('Details were updated successfully!')]);
            }

        }

        return response()->json(['fail'=> __('Something went wrong!')]);
    }

    public function addHeaderLink(Request $request) {
        
        if($request->ajax()) {
            
            $header_links_id = $request->header_links_id;

            if ($header_links_id) {

                $headerLink = HeaderLink::find($header_links_id);

                if (HeaderLink::find($header_links_id)) {

                    $headerSublink = new HeaderSublink();

                    $headerSublink->create($this->validateSublink());
                    
                    return response()->json(['success'=> __('Recored was added!')]);
                    
                }
               
                return response()->json(['fail'=> __('Something went wrong!')], 422);
                
            } else {

                $headerLink = new HeaderLink();

                if ($headerLink->create($this->validateLink())) {

                    return response()->json(['success'=> __('Recored was added!')]);
                }
            }

        }

        return response()->json(['fail'=> __('Something went wrong!')], 422);
    }
}

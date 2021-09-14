<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Group;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function isAuthorized() {

        $group = Group::find(Auth::user()->group_id);

        if (Gate::denies('group-media', $group)) {

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
        $this->isAuthorized();
        
        return view('admin.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isAuthorized();

        return view('admin.news.create');
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

        $this->validateContent();

        if ($files = $request->file('image')) {

            //store file into folder
            $file = $request->file('image')->store('public/news');
 
            //store your file into database
            $news = new News(request([
                'title',
                'title_en',
                'image',
                'content',
                'content_en',
                'type',
                'created_at'
            ]));

            $news->image = str_replace("public/news/", "", $file);

            $news->save();
              
            return redirect('/admin/news');
  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $this->isAuthorized();

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $this->isAuthorized();

        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->isAuthorized();

        if ($files = $request->file('image')) {

            Storage::disk('public')->delete($news->image);

            $file = $request->file('image')->store('public/news');
 
            $news->image = str_replace("public/news/", "", $file);

            $news->update($this->validateContent());
              
            // return redirect('/admin/news');

            return view('admin.news')->with('message', __('Details were updated successfully!'));
  
        } else {

            $news->update($this->validateContent());
              
            // return redirect('/admin/news');
            return redirect('/admin/news')->with('message', __('Details were updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $this->isAuthorized();

        if($news->image) {

            $file = Storage::disk('public')->delete("news/".$news->image);

            if($file) {
                $news->delete();
                session()->flash('message', __('Record was deleted!'));
            }
        }

        session()->flash('message', __('Something went wrong!'));
    }

    protected function validateContent()
    {

        return request()->validate([
            'title'        => 'required',
            'title_en'     => '',
            'content'      => 'required',
            'content_en'   => '',
            'type'         => 'required',
            'created_at'   => 'required',
        ]);

    }

    public function fetch_data(Request $request)
    {
        $this->isAuthorized();
        
        if($request->ajax()) {
            $sort_by = $request->get('sortby') ? $request->get('sortby') : 'created_at';
            $sort_type = $request->get('sorttype') ? $request->get('sorttype') : 'desc';
            $per_page = $request->get('perpage') ? $request->get('perpage') : 10;
            $search = str_replace(" ", "%", $request->get('search'));
            $news = News::
            where('title', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', '%'.$search.'%')
            ->orderBy($sort_by, $sort_type)
            ->paginate($per_page)
            ->onEachSide(1);
            return view('admin.news.data', compact('news'));
        }
    }

}

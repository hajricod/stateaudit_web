<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Folder;
use App\Models\Group;
use App\Models\Language;
use App\Models\Permission;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $lang = str_replace('_', '-', app()->getLocale());

        if (!View::exists('pages.' . $page)) {
            
            return abort(404);

        } else {

            return view('/pages.' . $page, compact('lang'));
        }
        
    }


    public function pageWithFiles(String $page, int $folder_id)
    {

        $lang              = Language::where('locale', '=', lang())->first();
        $folder            = Folder::findOrFail($folder_id);
        $group_public      = Group::find(6)->id;
        $permission_public = Permission::find(1)->id;


        if($folder->permission_id == $permission_public && $folder->group_id == $group_public) {
            $files  = File::where('folder_id', $folder->id)
            ->where('language_id',  $lang->id)
            ->orderBy('title')->get();
            
            return view('/pages/'.$page, compact(['folder', 'files']));
        }

        return abort(401);
        
    }
}

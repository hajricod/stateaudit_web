<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Folder;

class LibraryController extends Controller
{
    public $path = 'site.library.';

    public function index()
    {
        $folders     = Folder::where('sub_folder_id', NULL)->get();

        return view($this->path.'index', compact('folders'));
    }

    public function sub_folders_files(int $folder_id) {

        $folder    = Folder::find($folder_id);
        $folders   = Folder::where('sub_folder_id', '=', $folder_id)->get();
        $files     = File::where('folder_id', $folder_id)->get();

        return view($this->path.'sub_folders_files', compact('folder', 'folders', 'files'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardFolder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function standardSubFolders()
    {
        return $this->hasMany(StandardFolder::class, 'sub_standard_folder_id', 'id');
    }

    public function standardFiles()
    {
        return $this->hasMany(StandardFile::class, 'standard_folder_id', 'id');
    }
}

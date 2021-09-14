<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['folder_id', 'title', 'description', 'file_name', 'type', 'path', 'size'];

    public function file()
    {
        return $this->belongsTo(Folder::class);
    }
}

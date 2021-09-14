<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function programCategory()
    {
        return $this->belongsTo(ProgramCategory::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'program_list', 'id');
    }
}

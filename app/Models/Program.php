<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function list()
    {
        return $this->hasMany(ProgramList::class, 'program_id', 'id');
    }
    
}

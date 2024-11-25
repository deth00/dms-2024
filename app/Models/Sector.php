<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = "sectors";
    protected $fillable = ['id','branch_id','department_id','name','del'];

    public function brname()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id', 'id');
    }

    public function depname()
    {
        return $this->belongsTo('App\Models\Departments', 'department_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagDoc extends Model
{
    use HasFactory;

    protected $table = "tag_docs";

    protected $fillable = [
        'id','docit_id','department_id','sector_id','user_id','status'
    ];

    public function docname()
    {
        return $this->belongsTo('App\Models\Doc\DocumentIT','docit_id','id');
    }

    public function username()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}

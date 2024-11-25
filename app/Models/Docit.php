<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docit extends Model
{
    use HasFactory;

    protected $table = "tbl_doc_it";

    protected $fillable = [
        'id','doc_no','doc_date','doc_title','no','date_no','docgroup_id','dpart_id','docdpart_id','sh_id','k_id','type_id','filename','filepath','user_id'
    ];

    public function typename()
    {
        return $this->belongsTo('App\Models\Doc\DocType','type_id','id');
    }
    
    public function groupname()
    {
        return $this->belongsTo('App\Models\Doc\DocGroupIT','docgroup_id','id');
    }

    public function username()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}

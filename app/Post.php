<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    protected $guarded=['id'];
    use  SoftDeletes;
    protected $dates=['deleted_at'];
    public function user(){
        return $this->belongsTo(User::class);
    }

}

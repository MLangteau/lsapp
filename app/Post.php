<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name (if we did not want to keep the table name as Posts, then rename here)
    // Or keep as it is
    protected $table = 'posts';  // posts is what we already called it
    // Primary key
    public $primaryKey = 'id';   // or another field it we want; this is the default
    // Timestamps
    public $timestamps = true;   // this is default; could put false

    public function user(){
        return $this->belongsTo('App\User');
    }
}

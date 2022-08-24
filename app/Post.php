<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        "title", "text", "category_id"
    ];

    public function userDetail() {
        return $this->hasOne("App\UserDetail");
    }
    public function category() {
        return $this->belongsTo("App\Category");
    }
    public function tag() {
        return $this->belongsToMany("App\Tag");
    }
}

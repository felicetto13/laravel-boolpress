<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        "address",
        "city",
        "postal_code"
    ];
    public function user() {
        return $this->belongsTo("App\User");
    }
}

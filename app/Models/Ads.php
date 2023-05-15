<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

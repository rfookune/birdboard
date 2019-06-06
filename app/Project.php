<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // disable mass assignment protection
    protected $guarded = [];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}

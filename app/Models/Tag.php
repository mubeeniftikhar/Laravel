<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public function posts(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany('App\Models\Post','taggable');
    }
    public function videos(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany('App\Models\Video','taggable');
    }
}

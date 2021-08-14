<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];

    use HasFactory;

    protected $fillable = [

        'title',
        'content',
        'path'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo('App\Models\User');
    }

    public function photos(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }


    public function tags(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {

        return $this->morphToMany('App\Models\Tag', 'taggable');

    }

}

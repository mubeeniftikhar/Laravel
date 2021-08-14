<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function post(): \Illuminate\Database\Eloquent\Relations\HasOne
    {

        return $this->hasOne('App\Models\Post','user_id');
    }
    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany('App\Models\Post');
    }
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {

        return $this->belongsToMany('App\Models\Role');
    }
    public function rools(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {

        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');
    }

    public function photos(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany('App\Models\Photo','imageable');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Class_;
use App\Traits\Followable;
use App\Models\Tweet;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'picture'

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline()
    {
        // var_dump($this->name);
        $friends = $this->follows()->pluck('id');
        $friends->push($this->id);

        return Tweet::whereIn('user_id', $friends)->latest()->withlikes()->get();

    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest()->withLikes();
    }

    public function getAvatarAttribute()
    {
        if (isset( $this->picture ) ){
            return '/storage/'.$this->picture;
        }
        return "https://ui-avatars.com/api/?name=$this->name&size=40";
    }

    public function path($extension = '')
    {
        return route('profile', $this->username) . "/$extension" ;
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}

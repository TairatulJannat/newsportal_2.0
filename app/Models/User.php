<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'post_id');
    }
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification', 'id');
    }
    public function videos()
    {
        return $this->hasMany('App\Models\Backend\Gallery\VideoGallery', 'video_id');
    }
    public function Wallet()
    {
        return $this->belongsTo('App\Models\Wallet', 'wallet_id');
    }

    public function transitions()
    {
        return $this->hasMany('App\Models\Transition', 'transition_id');
    }

    public function bonuses()
    {
        return $this->hasMany('App\Models\Bonus', 'bonus_id');
    }
   
    public function blogs()
    {
        return $this->hasMany('App\Models\Backend\Blog\BlogPost', 'blog_id');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Backend\Division', 'id');
    }


}

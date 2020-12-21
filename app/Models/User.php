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

    /**
     *
     *
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function routeNotificationForNexmo($notification)
    {
        return '61426267158';
    }

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }
}

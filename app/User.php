<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Overtrue\LaravelFollow\Followable;
 
 
class User extends Authenticatable
{
    use Notifiable; 
 
    protected $fillable = [
        'name', 'mobile','email', 'password',
    ];
 
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}


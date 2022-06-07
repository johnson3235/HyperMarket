<?php

namespace App\Models;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\EmployeeResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'email', 'password',
    ];


    protected $casts = [
        'created_at' => 'datetime',
        'update_at' => 'datetime',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new EmployeeResetPassword($token));
    }
}

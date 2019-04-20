<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use  App\Http\Controllers\Admin\AdminController;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'honorific','name','lastname','phone','address','nic', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if($this->role=='admin'){
            return true;
        }
        return false;
    }

    public function isLawyer()
    {
        if($this->role=='lawyer'){
            return true;
        }
        return false;
    }

    public function isUser()
    {
        if($this->role=='user'){
            return true;
        }
        return false;
    }

}

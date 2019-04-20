<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminMessageClient extends Model
{
    protected $fillable=['c_id','c_name','email','message'];
}

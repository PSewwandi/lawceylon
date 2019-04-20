<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    protected $fillable=['name','email','subject','message'];
}

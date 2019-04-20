<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminMessageLawyer extends Model
{
    protected $fillable=['l_name','lawyer_id','email','message'];
}

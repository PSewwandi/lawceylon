<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class ratings extends Model
{
    public function lawyer()
    {
        return $this->belongsTo('App\Model\Lawyer\lawyer','rateable_id','id');
    }

}

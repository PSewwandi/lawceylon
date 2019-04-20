<?php

namespace App\Model\Lawyer;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Lawyer extends Model
{
    use Rateable;
    protected $fillable=['id','honorific','firstName','lastName','gender','Email','NIC_passportNumber','barnumber','password','Specialist_Area','Experience_Period','Address','TP_Number','biography','consultationFee','image','checked'];

    public function ratings(){

        return $this->hasMany('App\Model\User\ratings','rateable_id','id');
    }

}

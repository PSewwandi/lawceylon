<?php

namespace App\Model\Lawyer;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = ['title','start_date','end_date','time','lawyer_id','client_id','checked'];
}
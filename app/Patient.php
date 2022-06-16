<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Patient as Authenticatable;

class Patient extends Model
{
     public $timestamps=false;

protected $fillable = ['name', 'mobile','age','date'];

}



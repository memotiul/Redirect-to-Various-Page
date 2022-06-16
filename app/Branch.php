<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Branch as Authenticatable;

class Branch extends Model
{
     public $timestamps=false;

protected $fillable = ['name', 'amount'];

}



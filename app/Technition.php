<?php

namespace App;
use App\Model;
//use Illuminate\Database\Eloquent\Model;

class Technition extends Model
{
    public function checkups()
    {
    	return $this->hasMany(Checkup::class);
    }
}

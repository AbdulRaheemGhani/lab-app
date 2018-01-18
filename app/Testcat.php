<?php

namespace App;
use App\Model;

//use Illuminate\Database\Eloquent\Model;

class Testcat extends Model
{
    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}

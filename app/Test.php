<?php

namespace App;
use App\Model;
//use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function testcat()
    {
        return $this->belongsTo(Testcat::class);
    }

    public function checkups()
    {
        return $this->belongsToMany(Checkup::class);
    }
}

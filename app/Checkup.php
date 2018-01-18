<?php

namespace App;
use App\Checkup;
//use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function technition()
    {
        return $this->belongsTo(Technition::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class)->withTimestamps();
    }
}

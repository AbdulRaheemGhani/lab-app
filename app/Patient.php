<?php

namespace App;


class Patient extends Model
{
    public function patienttype()
    {
    	return $this->belongsTo(Patienttype::class);
    }
    public function checkups()
    {
    	return $this->hasMany(Checkup::class);
    }

    
    
}


<?php

namespace App;
use App\Model;


class Doctor extends Model
{
    public function scopeName($query, $name)
    {
        return $query->where('name', 'LIKE', '%'.$name.'%');
    }

    public function scopePercentage($query, $percentage)
    {
        return $query->where('percentage', 'LIKE', '%'.$percentage.'%');
    }
}

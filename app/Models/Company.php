<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function zones(){
        return $this->hasMany(Zone::class);
    }
    public function customers(){
        return $this->hasMany(Customer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function zone(){
        return $this->belongsTo(Zone::class);
    }
}

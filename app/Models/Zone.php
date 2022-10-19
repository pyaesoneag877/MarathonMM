<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function scopeFilter($query,$filter){

        $query->when($filter['search']??false,function ($query, $search){
            $query->where(function ($query) use ($search){
                $query->where('name','LIKE','%'.$search.'%')
                ->orWhere('name_mm','LIKE','%'.$search.'%'); 
            });
        });


        $query->when($filter['city']??false,function ($query, $name){
            $query->whereHas('city',function ($query) use($name){
                $query->where('name',$name);
            });
            
        });
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}

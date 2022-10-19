<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function scopeFilter($query,$filter){

        $query->when($filter['search']??false,function ($query, $search){
            $query->where(function ($query) use ($search){
                $query->where('name','LIKE','%'.$search.'%')
                ->orWhere('phone_no','LIKE','%'.$search.'%'); 
            });
        });

        $query->when($filter['city']??false,function ($query, $name){
            $query->whereHas('city',function ($query) use($name){
                $query->where('name',$name);
            }); 
        });
        
        $query->when($filter['zone']??false,function ($query, $name){
            $query->whereHas('zone',function ($query) use($name){
                $query->where('name',$name);
            }); 
        });

        
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function zone(){
        return $this->belongsTo(Zone::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected   $guarded = ['']; 

    public function users() 
    {
        return $this->belongsToMany(User::class,'user_tasks','task_id')
                ->withTimestamps();
    }
    
    protected function priority(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if($value == 1)
                {
                    return "VIP";
                }
                else if($value == 2){
                    return "Important";
                }
                else{
                    return "Normal";
                }
            },
        );
    }

}

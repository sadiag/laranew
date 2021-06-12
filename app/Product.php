<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
     'user_id', 'product_name', 
    ];
    
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';


    public function scopeSearch($query){
        if($key = request()->key){
            $query= $query->where('TENSACH', 'like','%' .$key. '%');
        }
        return $query;
}
}

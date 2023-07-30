<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
         'name' ,
         'category_id' ,
         'description' ,
         'price' ,
         'waiting_time',
         'image' ,
        'view-count',
    ];
}

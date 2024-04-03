<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'story',
        'price',
        'quantity',
        'image',
        'material',
        'color',
        'size',
        'category',
        'shopId',
    ];

    use HasFactory;
}

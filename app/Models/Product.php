<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'shop_id',
    ];

    use HasFactory;
    public function orders(): BelongsToMany {


        return $this->belongsToMany(Order::class);
    }
    public function stores(): HasMany {
        return $this->hasMany(Store::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    use HasUuids;
    public mixed $name;
    public mixed $price;
    public mixed $description;
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

    public function orders(): BelongsToMany {


        return $this->belongsToMany(Order::class);
    }
    public function stores(): HasMany {
        return $this->hasMany(Store::class);
    }
}

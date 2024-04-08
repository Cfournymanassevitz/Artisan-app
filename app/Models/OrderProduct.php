<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrderProduct extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'quantity',
        'order_id',
        'product_id',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    use HasUuids;

    public mixed $product_id;
    public mixed $quantity;
    public mixed $total;
    protected $fillable = [
        'id',
        'command_number',
        'user_id',
        'date',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class);
    }
}

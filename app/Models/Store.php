<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static find($id)
 */
class Store extends Model
{
    public mixed $name;
    public mixed $theme;
    public mixed $biography;
    protected $fillable = [
        'id',
        'User_id',
        'name',
        'theme',
        'biography',
    ];
    use HasFactory;


    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}

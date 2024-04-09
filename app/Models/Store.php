<?php

namespace App\Models;

use App\Http\Requests\StoreStoreRequest;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static find($id)
 */
// Dans Store.php

class Store extends Model
{
    use HasUuids;
    public mixed $name;
    public mixed $theme;
    public mixed $biography;
    protected $fillable = [
        'user_id',
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

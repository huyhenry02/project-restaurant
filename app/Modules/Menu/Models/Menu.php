<?php

namespace App\Modules\Menu\Models;

use App\Modules\CategoryFood\Models\CategoryFood;
use App\Modules\OrderDetail\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;
    public $table = 'menus';
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryFood::class);
    }
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}

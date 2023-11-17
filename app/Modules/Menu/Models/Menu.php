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
    protected $primaryKey = 'item_id';
    protected $fillable = [
        'item_name',
        'description',
        'price',
        'category_id',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryFood::class,'category_id','category_id');
    }
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class,'menu_id','item_id');
    }
}

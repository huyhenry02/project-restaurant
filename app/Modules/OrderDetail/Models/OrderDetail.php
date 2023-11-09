<?php

namespace App\Modules\OrderDetail\Models;

use App\Modules\Menu\Models\Menu;
use App\Modules\Order\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    public $table = 'order_details';
    protected $primaryKey = 'order_detail_id';
    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'total',
    ];

    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'item_id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}

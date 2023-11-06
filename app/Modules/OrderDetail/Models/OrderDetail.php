<?php

namespace App\Modules\OrderDetail\Models;

use App\Modules\Menu\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    public $table = 'order_details';
    public function menuItem(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}

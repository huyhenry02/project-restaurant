<?php

namespace App\Modules\Order\Models;

use App\Modules\Customer\Models\Customer;
use App\Modules\Table\Models\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    public $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'name',
        'customer_id',
        'table_id',
        'order_date',
        'total_amount',

    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'order_id','order_id');
    }
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class,'order_id','order_id');
    }
}

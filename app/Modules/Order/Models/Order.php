<?php

namespace App\Modules\Order\Models;

use App\Modules\Customer\Models\Customer;
use App\Modules\OrderDetail\Models\OrderDetail;
use App\Modules\Table\Models\Table;
use App\Modules\Table\Models\TableType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    public $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'name',
        'customer_id',
        'table_id',
        'table_type_id',
        'order_date',
        'total_amount',
        'time',
        'status',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id','customer_id');
    }
    public function table_order(): BelongsTo
    {
        return $this->belongsTo(Table::class,'table_id','table_id');
    }
    public function table_type_order(): BelongsTo
    {
        return $this->belongsTo(TableType::class,'table_type_id','table_type_id');
    }
    public function order(): HasMany
    {
        return $this->hasMany(OrderDetail::class,'order_id','order_id');
    }
}

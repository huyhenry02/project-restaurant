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
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}

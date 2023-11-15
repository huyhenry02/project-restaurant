<?php

namespace App\Modules\Reservation\Models;

use App\Modules\Customer\Models\Customer;
use App\Modules\Table\Models\Table;
use App\Modules\Table\Models\TableType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    public $table = 'reservations';
    protected $primaryKey = 'reservation_id';
    protected $fillable = [
        'name',
        'number_of_guests',
        'reservation_date',
        'time',
        'time_out',
        'note',
        'status',
        'customer_id',
        'table_id',
        'table_type_id',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
    public function table_reservation(): BelongsTo
    {
        return $this->belongsTo(Table::class,'table_id','table_id');
    }
    public function table_type_reservation(): BelongsTo
    {
        return $this->belongsTo(TableType::class,'table_type_id','table_type_id');
    }
}

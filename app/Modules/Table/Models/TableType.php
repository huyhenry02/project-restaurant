<?php

namespace App\Modules\Table\Models;

use App\Modules\Order\Models\Order;
use App\Modules\Reservation\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TableType extends Model
{
    use HasFactory;
    public $table = 'table_types';
    protected $primaryKey = 'table_type_id';
    protected $fillable = [
        'name',
        'description',
        'amount',
    ];
    public function tables(): HasMany
    {
        return $this->hasMany(Table::class,'table_type_id','table_type_id');
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class,'table_type_id','table_type_id');
    }
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class,'table_type_id','table_type_id');
    }
}

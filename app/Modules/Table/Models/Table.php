<?php

namespace App\Modules\Table\Models;

use App\Modules\Order\Models\Order;
use App\Modules\Reservation\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    use HasFactory;
    public $table = 'tables';
    protected $primaryKey = 'table_id';
    protected $fillable = [
        'name',
    ];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class,'table_id','table_id');
    }
    public function table_item(): BelongsTo
    {
        return $this->belongsTo(TableType::class,'table_type_id','table_type_id');
    }
}

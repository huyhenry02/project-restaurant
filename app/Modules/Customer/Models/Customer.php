<?php

namespace App\Modules\Customer\Models;

use App\Modules\Order\Models\Order;
use App\Modules\Reservation\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    public $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
    ];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class,'customer_id','customer_id');
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class,'customer_id','customer_id');
    }
}
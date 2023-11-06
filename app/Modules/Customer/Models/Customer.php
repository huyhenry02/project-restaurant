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
    public $table = '=customers';
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

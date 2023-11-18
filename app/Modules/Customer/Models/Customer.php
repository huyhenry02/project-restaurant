<?php

namespace App\Modules\Customer\Models;

use App\Modules\Order\Models\Order;
use App\Modules\Reservation\Models\Reservation;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
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

<?php

namespace App\Modules\Employee\Models;

use App\Modules\Role\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $table = 'employees';
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'is_active',
        'role_id',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class,'role_id','role_id');
    }

}

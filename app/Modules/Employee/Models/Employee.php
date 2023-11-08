<?php

namespace App\Modules\Employee\Models;

use App\Modules\Role\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    public $table = 'employees';
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'is_active',
        'role_id',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class,'employee_id','employee_id');
    }

}

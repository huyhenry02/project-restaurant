<?php

namespace App\Modules\Role\Models;

use App\Modules\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    public $table = 'roles';
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

}

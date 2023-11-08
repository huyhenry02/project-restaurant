<?php

namespace App\Modules\Facility\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    public $table = 'facilities';
    protected $primaryKey = 'facility_id';
    protected $fillable = [
        'name',
        'amount',
    ];

}

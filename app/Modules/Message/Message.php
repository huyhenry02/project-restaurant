<?php

namespace App\Modules\Message;

use App\Modules\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;
    public $table = 'messages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_customer',
        'email',
        'subject',
        'message',
    ];
}

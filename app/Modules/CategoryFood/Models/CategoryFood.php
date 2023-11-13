<?php

namespace App\Modules\CategoryFood\Models;

use App\Modules\Menu\Models\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryFood extends Model
{
    use HasFactory;
    public $table = 'category_foods';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'name'
    ];

    public function menuItems(): HasMany
    {
        return $this->hasMany(Menu::class,'category_id','category_id');
    }

}

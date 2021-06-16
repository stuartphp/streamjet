<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'parent_id',
        'is_active'
    ];

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'id', 'parent_id');
    }
}

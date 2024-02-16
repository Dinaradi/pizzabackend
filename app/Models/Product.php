<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'types' => 'array',
        'sizes' => 'array',
    ];

    protected $table = 'products';
    protected $guarded = ['id'];

    // protected $fillable = ['image', 'name', 'price', 'types', 'sizes', 'rating'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

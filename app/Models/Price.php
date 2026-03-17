<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subcategory_id',
        'status',
        'image'
    ];

    // Relationship with ProductPrice
    public function price()
    {
        return $this->hasOne(ProductPrice::class);
    }

    // Relationship with Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Relationship with Sizes through pivot
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'sized_products');
    }
}
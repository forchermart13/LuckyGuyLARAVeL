<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizedProduct extends Model
{
    protected $table = 'sized_products';
    
    protected $fillable = [
        'product_id',
        'size_id'
    ];

    public $timestamps = true; // If you have timestamps

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
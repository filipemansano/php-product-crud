<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'name', 'quantity', 'category_id'
    ];

    public function category() {
        $this->belongsTo(Category::class, 'product_id');
    }
}

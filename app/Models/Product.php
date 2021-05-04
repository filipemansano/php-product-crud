<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name', 'quantity', 'category_id'
    ];

    protected $dates = [
        'updated_at', 'created_at'
    ];

    public function category() {
        $this->belongsTo(Category::class, 'product_id');
    }
}

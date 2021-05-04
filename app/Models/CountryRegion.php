<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryRegion extends Model
{
    use HasFactory;

    protected $table = 'country_region';

    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'initials'
    ];

    public function UFS() {
        $this->hasMany(UF::class, 'country_region_id');
    }
}

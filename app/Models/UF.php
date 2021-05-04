<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UF extends Model
{

    use HasFactory;

    protected $table = 'uf';

    public $timestamps = false;

    protected $fillable = [
        'name', 'initials', 'country_region_id'
    ];

    public function Region() {
        $this->belongsTo(CountryRegion::class, 'country_region_id');
    }
}

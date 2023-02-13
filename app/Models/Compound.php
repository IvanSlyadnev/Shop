<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compound extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'composition', 'weight'
    ];
    protected $casts = [
        'composition' => 'json'
    ];

    public function products() {
        return $this->morphMany(Product::class, 'productable');
    }
}

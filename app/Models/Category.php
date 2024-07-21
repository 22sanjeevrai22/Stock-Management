<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Variation;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function variations(){
        return $this->hasMany(Variation::class, 'category_id');
    }
}

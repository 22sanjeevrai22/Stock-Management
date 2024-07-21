<?php

namespace App\Models;


use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');

    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function suppliers(){
        return $this->belongsToMany(Supplier::class, 'product_supplier');
    }

    public function items(){
        return $this->hasMany(Item::class, 'product_id');
    }
}

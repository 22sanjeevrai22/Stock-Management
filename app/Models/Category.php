<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Variation;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function variations(){
        return $this->hasMany(Variation::class, 'category_id');
    }

    public function subCategories(){
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function parentCategory(){
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->width(50)
            ->height(50)
            ->keepOriginalImageFormat()
            ->nonQueued();

        $this
            ->addMediaConversion('thumbnail')
            ->width(300)
            ->height(300)
            ->keepOriginalImageFormat()
            ->nonQueued();
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            ->singleFile();
    }
}

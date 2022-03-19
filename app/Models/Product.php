<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;
    protected $fillable = ['name', 'price', 'description', 'status', 'category_id'];
    public $translatable = ['name', 'description', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_product', 'offer_id', 'product_id');
    }
}

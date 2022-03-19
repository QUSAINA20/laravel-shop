<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Offer extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;
    public $translatable = ['name'];

    protected $fillable = ['name', 'discount', 'type', 'started_at', 'ended_at',];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'offer_product', 'offer_id', 'product_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'offer_category', 'offer_id', 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable =
    [
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_Price',
        'selling_Price',
        'image',
        'quantity',
        'tax',
        'status',
        'trending',
        'mate_title',
        'mate_keywords',
        'mate_description',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

}

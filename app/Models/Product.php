<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'qunatity',
        'image',
        'size',
        'colour',
        'sub_category_id',
        'brand_id'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
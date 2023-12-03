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
        'quantity',
        'image',
        'size',
        'colour',
        'sub_category_id',
        'brand_id'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'feedback_id', 'id');
    }

    // Define the relationship with the Orderdetails model
    public function orderDetails()
    {
        return $this->hasMany(Orderdetails::class, 'product_id', 'id');
    }
}
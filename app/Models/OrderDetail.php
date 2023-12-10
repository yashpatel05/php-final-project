<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'quantity',
        'order_id',
        'product_id',
        'total_amount'
    ];

    // Define the relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

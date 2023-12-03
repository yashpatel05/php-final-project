<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'description',
        'order_date',
        'payment_status',
        'user_id',
        'order_status'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the relationship with the Orderdetails model
    public function orderDetails()
    {
        return $this->hasMany(Orderdetails::class, 'order_id');
    }
}
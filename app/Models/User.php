<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory;
    use Billable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'password',
        'email',
        'contact_no',
        'street_address',
        'city',
        'state',
        'postal_code',
        'country'
    ];

    // Add a hasMany relationship to get all feedbacks associated with the user
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id', 'id');
    }

    // Add a hasMany relationship to get all orders associated with the user
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }
}
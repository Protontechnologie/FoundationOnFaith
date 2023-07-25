<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $table = 'donation';
    protected $fillable = [
        'name', 'email','amount','is_paid','order_id','last_4_digit','payment_link','response_data'
    ];
}

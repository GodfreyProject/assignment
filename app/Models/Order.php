<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'discount_code', 'discount_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}

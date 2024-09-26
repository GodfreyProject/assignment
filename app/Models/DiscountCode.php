<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    protected $fillable = ['code', 'amount', 'user_id', 'used'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}

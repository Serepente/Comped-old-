<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'finance_id',
        'user_id',
        'amount',
        'gcash_number',
        'status',
    ];

    public function finance()
    {
        return $this->belongsTo(Finance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



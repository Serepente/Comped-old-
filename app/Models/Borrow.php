<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'borrower_name', 'school_id', 'date_issued', 'return_date', 'borrowed_item', 'quantity', 'status'
    ];

    // protected $casts = [
    //     'borrowed_items' => 'array',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

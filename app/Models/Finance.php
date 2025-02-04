<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'finance';

    protected $fillable = [
        'payment_name',
        'amount',
        'description',
        'status',
    ];

    public static function getStatusOptions()
    {
        return ['Pending', 'Pending-Approval', 'Approved'];
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

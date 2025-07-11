<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'service_id',
        'user_id',
        'amount',
        'status',
        'transaction_date',
    ];

    protected $casts = [
        'amount' => 'encrypted',
        'type' => 'encrypted',
        'notes' => 'encrypted',
        'transaction_date' => 'date', // Pas chiffré (filtrage possible)
    ];

}

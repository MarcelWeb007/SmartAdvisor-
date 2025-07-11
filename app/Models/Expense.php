<?php

namespace App\Models;

use App\Traits\HasEncryptedAttributesWithIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory, HasEncryptedAttributesWithIndex;

    protected $fillable = [
        'company_id',
        'title',
        'amount',
        'category',
        'expense_date',
        'notes',
    ];

    protected $casts = [
        'title' => 'encrypted',
        'amount' => 'encrypted',
        'category' => 'encrypted',
        'notes' => 'encrypted',
        'expense_date' => 'date',
    ];

    protected array $indexable = [
        'title', // Added indexable attribute for title
        'category', // Added indexable attribute for category
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

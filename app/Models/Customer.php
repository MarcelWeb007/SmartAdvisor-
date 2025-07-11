<?php

namespace App\Models;

use App\Traits\HasEncryptedAttributesWithIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, HasEncryptedAttributesWithIndex;

    protected $fillable = [
        'company_id',
        'name',
        'email',
        'phone',
        'company',
        'notes',
    ];

    protected $casts = [
        'name' => 'encrypted',
        'email' => 'encrypted',
        'phone' => 'encrypted',
        'company' => 'encrypted',
        'notes' => 'encrypted',
    ];

    protected array $indexable = [
        'name', // Added indexable attribute for name
        'company', // Added indexable attribute for company
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }



}

<?php

namespace App\Models;

use App\Traits\HasEncryptedAttributesWithIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, HasEncryptedAttributesWithIndex;

    protected $fillable = [
        'company_id',
        'name',
        'description',
        'price',
        'is_active',
        'type',
    ];

    protected $casts = [
        'name' => 'encrypted',
        'description' => 'encrypted',
        'price' => 'encrypted',
    ];

    protected array $indexable = [
        'name', // Added indexable attribute for name
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

<?php

namespace App\Models;

use App\Traits\HasEncryptedAttributesWithIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, HasEncryptedAttributesWithIndex;

    protected $fillable = [
        'name',
        'type',
        'industry',
        'logo_path',
    ];

    protected $casts = [
        'name' => 'encrypted',
        'type' => 'encrypted',
        'industry' => 'encrypted',
    ];

    protected array $indexable = [
        'name', // Added indexable attribute for name
        'industry', // Added indexable attribute for industry
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function aiInsights()
    {
        return $this->hasMany(AiInsights::class);
    }

}

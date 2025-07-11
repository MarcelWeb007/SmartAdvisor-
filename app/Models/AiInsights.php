<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiInsights extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'summary',
        'data',
    ];

    protected $casts = [
        'title' => 'encrypted',
        'summary' => 'encrypted',
        'data_used' => 'encrypted:json',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

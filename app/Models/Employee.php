<?php

namespace App\Models;

use App\Http\Traits\QueryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, QueryTrait;

    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

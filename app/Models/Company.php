<?php

namespace App\Models;

use App\Http\Traits\QueryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory, QueryTrait;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

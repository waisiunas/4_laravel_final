<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'title',
        'first_name',
        'last_name',
        'email',
        'phone_no',
        'website',
        'address',
    ];
}

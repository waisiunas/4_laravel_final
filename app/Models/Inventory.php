<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'total_quantity',
        'damaged_quantity',
        'sold_quantity',
        'current_quantity',
        'wall_no',
        'section',
        'rack_no',
        'shelf_no',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

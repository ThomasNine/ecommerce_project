<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAddTransaction extends Model
{
    use HasFactory;
    protected $fillable=['supplier_id','product_id','total_quantity'];
    protected function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    protected function product(){
        return $this->belongsTo(Product::class);
    }
}

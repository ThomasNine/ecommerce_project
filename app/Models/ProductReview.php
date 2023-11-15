<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable=['user_id','product_id','review','rating'];
    protected function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    protected function product(){
        return $this->belongsTo(Product::class);
    }
}

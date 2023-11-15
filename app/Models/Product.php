<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable= ['category_id','supplier_id','brand_id','slug','name','image','discount_price','sale_price','total_quantity','like_count','view_count'];
    protected function brand(){
        return $this->belongsTo(Brand::class);
    }
    protected function category(){
        return $this->belongsTo(Category::class);
    }
    protected function color(){
        return $this->belongsToMany(Color::class);
    }
    protected function transaction(){
        return $this->hasMany(ProductAddTransaction::class);
    }
    protected function cart(){
        return $this->hasMany(ProductCart::class);
    }
    protected function order(){
        return $this->hasMany(ProductOrder::class);
    }
    protected function review(){
        return $this->hasMany(ProductReview::class);
    }
    protected function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}

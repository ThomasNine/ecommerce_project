<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable=['name','image','discription'];
    protected function transaction(){
        return $this->hasMany(ProductAddTransaction::class);
    }
    protected function product(){
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [];
    public $timestamp = true;
    use HasFactory;

    public function category(){
        // quan hệ n -> 1 (từ bảng con => bảng cha)
        return $this->belongsTo(Category::class, 'cate_id');
    }
}

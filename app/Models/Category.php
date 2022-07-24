<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model

{
    protected $table = 'categories';
    protected $fillable = ['name', 'status'];
    public $timestamp = true;
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class, 'cate_id');
    }
    
    // public function getAll()
    // {
    //     return DB::table('categories')->get();
    // }

    // public function cateAll() {
    //    return DB::table($this->table)
    //      ->orderBy('created_at', 'desc')
    //      ->paginate(5);
    // }




}

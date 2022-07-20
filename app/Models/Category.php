<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model

{
    protected $table = 'categories';
    public $timestamp = true;
    use HasFactory;

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

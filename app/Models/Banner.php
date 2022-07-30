<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['title', 'status', 'slides_image'];
    public $timestamp = true;
    use HasFactory;
}

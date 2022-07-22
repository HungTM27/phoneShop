<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideBanner extends Model
{
    protected $table = 'sliders';
    protected $fillable = [];
    public $timestamp = true;
    use HasFactory;
}

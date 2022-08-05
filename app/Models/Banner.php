<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    protected $table = 'sliders';
    public $timestamp = true;
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $primaryKey = 'cat_id';
    protected $fillable = ['name','date_of_birth','age'];
    public $timestamps = false;
}

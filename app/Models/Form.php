<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['path'];
    public $directory = './images/';
    use HasFactory;

    public function getPathAttribute($value){
    return $this->directory.$value;
    }
}

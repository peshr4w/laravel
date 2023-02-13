<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    use HasFactory;

    protected $fillabe = [
        'title',
        'image',
        'heading',
        'body'
    ];
    public $directory = './images/';
    public function getPathAttribute($value)
    {
        return $this->directory.$value;
    }


}

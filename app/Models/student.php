<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use SoftDeletes;
    protected $table = "students";
    protected $fillable = ['name', 'image'];
    use HasFactory;

    public function teacher()
    {
        return $this->hasOne(teacher::class);
    }
    public function lessons()
    {
        return $this->hasMany(lessons::class);
    }
    public function classes()
    {
        return $this->belongsToMany(classes::class);
    }
    public $directory = '/images/';
    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }
}

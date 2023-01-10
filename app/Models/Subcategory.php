<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Package()
    {
        return $this->hasMany(Package::class);
    }
}

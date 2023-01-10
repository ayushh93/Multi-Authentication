<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function Subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function gallery()
    {
        return $this->hasMany(Packagegallery::class);
    }
    
    public function recommendedgears()
    {
        return $this->hasOne(Recommendedgears::class);
    }
    
    public function itinerary()
    {
        return $this->hasMany(Itinerary::class);
    }
    public function costdetail()
    {
        return $this->hasMany(Costdetail::class);
    }
}


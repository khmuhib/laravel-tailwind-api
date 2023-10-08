<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function comments()
    {
        return $this->hasMany(NewsComment::class);
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'newscategory_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

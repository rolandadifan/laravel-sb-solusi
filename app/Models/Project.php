<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectImage;
use App\Models\Category;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'slug', 'desc'];

    public function gallery()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'active',
        'user_id'
    ];

    // public function products(){
    //     return $this->hasMany(Product::class);
    // }

    // public function suggestions(){
    //     return $this->hasMany(Suggestion::class);
    // }

    // public function parent()
    // {
    //     return $this->belongsTo('Category', 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id');
    // }
}
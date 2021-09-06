<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'thumbnail',
        'content',
        'description',
        'slug',
        'active',
        'user_id',
        'category_id'
    ];

    // public function products(){
    //     return $this->hasMany(Product::class);
    // }

    // public function suggestions(){
    //     return $this->hasMany(Suggestion::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function children()
    // {
    //     return $this->hasMany(Post::class, 'parent_id');
    // }
}
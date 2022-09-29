<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PostApi extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'posts';

    protected $fillable = ['slug', 'type', 'title', 'content', 'image_path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }
}

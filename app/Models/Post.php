<?php

namespace App\Models;

use App\Contracts\Likeable;
use App\Models\Concerns\Likes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Likeable
{
    use HasFactory;
    use Likes;

    protected $fillable = [
        'title',
        'body',
    ];
}

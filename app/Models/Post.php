<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

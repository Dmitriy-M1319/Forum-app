<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    /*
     * Table in database
     * @var string
     */
    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    public $timestamps = false;

    protected $fillable = [
        'nickname',
        'date_create',
        'post_text',
        'carma',
        'thread_id'
    ];

    public function comments()
    {
        return $this->hasMany(ForumComment::class, 'post_id');
    }

    public function thread()
    {
        return $this->belongsTo(ForumThread::class, 'thread_id');
    }
}

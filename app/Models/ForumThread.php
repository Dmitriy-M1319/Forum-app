<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    protected $table = 'threads';

    protected $primaryKey = 'thread_id';

    protected $fillable = [
        'theme'
    ];

    public $timestamps = false;


    public function posts()
    {
        return $this->hasMany(ForumPost::class);
    }
}

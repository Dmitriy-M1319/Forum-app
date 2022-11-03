<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    protected $table = 'thread';

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

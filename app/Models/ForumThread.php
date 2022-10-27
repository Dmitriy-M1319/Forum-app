<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    use HasFactory;

    protected $table = 'thread';

    protected $primaryKey = 'thread_id';

    public $timestamps = false;
}

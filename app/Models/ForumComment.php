<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    use HasFactory;

    /*
     * Table in database
     * @var string
     */
    protected $table = 'comments';

    /*
     * Primary key
     * @var string
     */
    protected $primaryKey = 'comm_id';

    /*
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'nickname',
        'post_id',
        'comm_text',
        'carma'
    ];

    public function post()
    {
        return $this->belongsTo(ForumPost::class);
    }

}

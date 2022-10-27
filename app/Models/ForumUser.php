<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumUser extends Model
{
    use HasFactory;

    /* 
     * Table in database
     * @var string
     */
    protected $table = 'users';

    /*
     * Primary key
     * @var string
     */
    protected $primaryKey = 'nickname';

    /*
     * Type of primary key
     * @var string
     */
    protected $keyType = 'string';

    /*
     * @var bool
     */
    public $timestamps = false;

}

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
    protected $table = 'forum_user';

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'role',
        'register_date',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $incrementing = false;

    /*
     * @var bool
     */
    public $timestamps = false;

}

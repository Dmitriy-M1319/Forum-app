<?php

namespace App\Models;

use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ForumUser extends Authenticatable
{
    use Notifiable;
    use \Illuminate\Auth\Authenticatable;
    use Authorizable;

    /*
     * Table in database
     * @var string
     */
    protected $table = 'forum_users';

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

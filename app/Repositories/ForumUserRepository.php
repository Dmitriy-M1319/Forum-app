<?php

namespace App\Repositories;

use App\Models\ForumUser;

class ForumUserRepository
{
    public static function destroyUser($nickname) {
        $deletedUser = ForumUser::where('nickname', $nickname)->first();
        if(empty($deletedUser))
            abort(404);
        $deletedUser->delete();
    }
}

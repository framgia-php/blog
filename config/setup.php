<?php

return [

    'status_active' => true,
    'post_is_trending' => true,
    'user_status_active' => true,
    'default_pagination_limit' => 10,
    'users_avatars_path' => 'uploads/users/avatars/',
    'default_post_comments_limit' => 5,
    'default_trending_comments_limit' => 5,
    'default_tag_limit' => 5,

    'commentable_types' => [
        'post' => \App\Models\Post::class,
    ],

];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Website entities.
    |--------------------------------------------------------------------------
    |
    | Here you may list all entities that exists in website system. They are
    | categories, tags, posts...
    */

    'types' => [
        'categories',
        'tags',
        'posts',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Website Roles
    |--------------------------------------------------------------------------
    |
    | Here you may list all roles of website admin system. They are such as
    | Categories Manager, Posts Manger...
    */

    'roles' => [
        1 => [
            'name' => 'categories-manager',
            'label' => 'Categories manager',
            'description' => 'This manager can view, create and update categories.',
            'editable' => false,
            'deleteable' => false,
        ],

        2 => [
            'name' => 'tags-manager',
            'label' => 'Tags mananger',
            'description' => 'This manager can view, create and update tags.',
            'editable' => false,
            'deleteable' => false,
        ],

        3 => [
            'name' => 'posts-manager',
            'label' => 'Posts manager',
            'description' => 'This manager can view, create and update posts',
            'editable' => false,
            'deleteable' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Website Permissions
    |--------------------------------------------------------------------------
    |
    | Here you may list all permissions of website admin system. They are such
    | as view posts, create posts, edit posts... and more.
    */

    'permissions' => [
        1 => [
            'name' => 'view-categories',
            'label' => 'View categories',
            'description' => 'View a listing of categories resources.',
        ],

        2 => [
            'name' => 'create-categories',
            'label' => 'Create categories',
            'description' => 'Create new categories.',
        ],

        3 => [
            'name' => 'edit-categories',
            'label' => 'Edit categories',
            'description' => 'Edit exists categories.',
        ],

        4 => [
            'name' => 'delete-categories',
            'label' => 'Delete categories',
            'description' => 'Delete exists categories.',
        ],

        5 => [
            'name' => 'view-tags',
            'label' => 'View tags',
            'description' => 'View a listing of tags.',
        ],

        6 => [
            'name' => 'create-tags',
            'label' => 'Create tags',
            'description' => 'Create new tags.',
        ],

        7 => [
            'name' => 'edit-tags',
            'label' => 'Edit tags',
            'description' => 'Edit exists tags.',
        ],

        8 => [
            'name' => 'delete-tags',
            'label' => 'Delete tags',
            'description' => 'Delete exists tags.',
        ],

        9 => [
            'name' => 'view-posts',
            'label' => 'View posts',
            'description' => 'View a listing of posts.',
        ],

        10 => [
            'name' => 'create-posts',
            'label' => 'Create posts',
            'description' => 'Create new posts.',
        ],

        11 => [
            'name' => 'edit-posts',
            'label' => 'Edit posts',
            'description' => 'Edit exists posts.',
        ],

        12 => [
            'name' => 'delete-posts',
            'label' => 'Delete posts',
            'description' => 'Delete exists posts.',
        ],

    ],

];

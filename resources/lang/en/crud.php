<?php
return [
    'settings'=> [
            "project_url"=>'localhost',
    ],
    'users' => [
        'menu_name'      => 'All users', 
        'slug'           => 'users',
        'slug_singular'  => 'user',
        'title'          => 'Users',
        'title_singular' => 'User',
        // 'role'           => 'all',
        'messages' =>[
            'create'     => 'User created successfully',
            'update'     => 'User updated successfully',
            'delete'     => 'User deleted successfully',
            'status'     => 'Status changed successfully',
        ],
     ],
     'staff' => [
        'menu_name'      => 'All managers', 
        'slug'           => 'managers',
        'slug_singular'    => 'manager',
        'title'          => 'managers',
        'title_singular' => 'manager',
        'role'           => 'Manager',
        'messages'        =>[
            'create'     => 'manager created successfully',
            'update'     => 'manager updated successfully',
            'delete'     => 'manager deleted successfully',
            'status'     => 'status changed successfully',
        ],
     ],
     'customers' => [
        'menu_name'      => 'Business', 
        'slug'           => 'business',
        'slug_singular'    => 'business',
        'title'          => 'Business',
        'title_singular' => 'Business',
        'role'           => 'Business',
        'messages'        =>[
            'create'     => 'Business created successfully',
            'update'     => 'Business updated successfully',
            'delete'     => 'Business deleted successfully',
            'status'     => 'Status changed successfully',
        ],
    ],
    'types' => [
        'menu_name'      => 'Types', 
        'slug'           => 'types',
        'slug_singular'    => 'types',
        'title'          => 'Types',
        'title_singular' => 'Type',
     //    'role'           => 'Business',
        'messages'        =>[
            'create'     => 'Type created successfully',
            'update'     => 'Type updated successfully',
            'delete'     => 'Type deleted successfully',
            'status'     => 'Status changed successfully',
        ],
    ],
    'categories' => [
        'menu_name'      => 'Categories', 
        'slug'           => 'categories',
        'slug_singular'    => 'categories',
        'title'          => 'Categories',
        'title_singular' => 'Category',
     //    'role'           => 'Business',
        'messages'        =>[
            'create'     => 'Category created successfully',
            'update'     => 'Category updated successfully',
            'delete'     => 'Category deleted successfully',
            'status'     => 'Status changed successfully',
        ],
    ],
  
];
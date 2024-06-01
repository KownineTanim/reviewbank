<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\App\Models\Permission::exists()) {
            \App\Models\Permission::insert([
                    [
                        'name' => 'Access Dashbaord',
                        'category' => 'Dashbaord'
                    ],
                    [
                        'name' => 'Manage Ads',
                        'category' => 'Ads'
                    ],
                    [
                        'name' => 'Create Ads',
                        'category' => 'Ads'
                    ],
                    [
                        'name' => 'Edit Ads',
                        'category' => 'Ads'
                    ],
                    [
                        'name' => 'Manage Blog',
                        'category' => 'Blog'
                    ],
                    [
                        'name' => 'Create Blog',
                        'category' => 'Blog'
                    ],
                    [
                        'name' => 'Edit Blog',
                        'category' => 'Blog'
                    ],
                    [
                        'name' => 'Manage Category',
                        'category' => 'Category'
                    ],
                    [
                        'name' => 'Create Category',
                        'category' => 'Category'
                    ],
                    [
                        'name' => 'Edit Category',
                        'category' => 'Category'
                    ],
                    [
                        'name' => 'Approve Category',
                        'category' => 'Category'
                    ],
                    [
                        'name' => 'Manage Sub-Category',
                        'category' => 'Sub-Category'
                    ],
                    [
                        'name' => 'Create Sub-Category',
                        'category' => 'Sub-Category'
                    ],
                    [
                        'name' => 'Edit Sub-Category',
                        'category' => 'Sub-Category'
                    ],
                    [
                        'name' => 'Approve Sub-Category',
                        'category' => 'Sub-Category'
                    ],
                    [
                        'name' => 'Manage Brand',
                        'category' => 'Brand'
                    ],
                    [
                        'name' => 'Create Brand',
                        'category' => 'Brand'
                    ],
                    [
                        'name' => 'Edit Brand',
                        'category' => 'Brand'
                    ],
                    [
                        'name' => 'Approve Brand',
                        'category' => 'Brand'
                    ],
                    [
                        'name' => 'Manage Product',
                        'category' => 'Product'
                    ],
                    [
                        'name' => 'Create Product',
                        'category' => 'Product'
                    ],
                    [
                        'name' => 'Edit Product',
                        'category' => 'Product'
                    ],
                    [
                        'name' => 'Approve Product',
                        'category' => 'Product'
                    ],
                    [
                        'name' => 'Manage Review',
                        'category' => 'Review'
                    ],
                    [
                        'name' => 'Create Review',
                        'category' => 'Review'
                    ],
                    [
                        'name' => 'Edit Review',
                        'category' => 'Review'
                    ],
                    [
                        'name' => 'Approve Review',
                        'category' => 'Review'
                    ],
                    [
                        'name' => 'Manage Contact-Us',
                        'category' => 'Contact-Us'
                    ],
                    [
                        'name' => 'Delete Contact-Message',
                        'category' => 'Contact-Us'
                    ],
                    [
                        'name' => 'Manage General-Settings',
                        'category' => 'General-Settings'
                    ],
                    [
                        'name' => 'Manage Landing-Page-Item',
                        'category' => 'Landing-Page-Item'
                    ],
                    [
                        'name' => 'Create Landing-Page-Item',
                        'category' => 'Landing-Page-Item'
                    ],
                    [
                        'name' => 'Delete Landing-Page-Item',
                        'category' => 'Landing-Page-Item'
                    ],
                    [
                        'name' => 'Manage Role',
                        'category' => 'Role'
                    ],
                    [
                        'name' => 'Create Role',
                        'category' => 'Role'
                    ],
                    [
                        'name' => 'Edit Role',
                        'category' => 'Role'
                    ],
                    [
                        'name' => 'Manage Slider',
                        'category' => 'Slider'
                    ],
                    [
                        'name' => 'Create Slider',
                        'category' => 'Slider'
                    ],
                    [
                        'name' => 'Edit Slider',
                        'category' => 'Slider'
                    ],
                    [
                        'name' => 'Manage User',
                        'category' => 'User'
                    ],
                    [
                        'name' => 'Create User',
                        'category' => 'User'
                    ],
                    [
                        'name' => 'Edit User',
                        'category' => 'User'
                    ],
             ]);

            $data = array_map(function ($id) {
                return [
                      'role_id' => 1,
                      'permission_id' => $id
                  ];
            }, range(1, \App\Models\Permission::count()));

            \App\Models\RoleHasPermission::insert($data);
        }
    }
}

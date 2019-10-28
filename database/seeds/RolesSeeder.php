<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Superadmin = Role::create([
            'name' => 'Quản trị viên cấp cao',
            'slug' => 'Super Admin',
            'permissions' => [
                'view' => true,
                'create' => true,
                'edit' => true,
                'delete' => true,
            ]
        ]);
        $Administrator = Role::create([
            'name' => 'Người quản lý',
            'slug' => 'Administrator',
            'permissions' => [
                'view' => true,
                'create' => true,
                'edit' => true,
                'delete' => true,
            ]

        ]);
        $Editor = Role::create([
            'name' => 'Biên tập viên',
            'slug' => 'Editor',
            'permissions' => [
                'view' => true,
                'create' => true,
                'edit' => true,
                'delete' => true,
            ]
        ]);
        $Contributor = Role::create([
            'name' => 'Cộng tác viên',
            'slug' => 'Contributor',
            'permissions' => [
                'view' => true,
                'create' => true,
                'edit' => true,
                'delete' => true,
            ]
        ]);
        $Subscriber = Role::create([
            'name' => 'Người đăng ký',
            'slug' => 'Subscriber',
            'permissions' => [
                'view' => true,
                'create' => true,
                'edit' => true,
                'delete' => true,
            ]
        ]);
    }
}

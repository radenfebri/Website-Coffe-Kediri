<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        Permission::create([
            'name' => 'Dashboard',
            'guard_name' => 'web'
        ]);

        // Manajemen Pesanan
        Permission::create([
            'name' => 'Manajemen Pesanan',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pesanan Packing',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pesanan Kirim',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pesanan Success',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pesanan Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pesanan Update',
            'guard_name' => 'web'
        ]);

        // Manajemen Rating
        Permission::create([
            'name' => 'Manajemen Rating',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Manajemen Rating NonActive',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Manajemen Rating Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Manajemen Rating Update',
            'guard_name' => 'web'
        ]);

        // Kategori Produk
        Permission::create([
            'name' => 'Kategori Produk',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Kategori Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Kategori Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Kategori Update',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Kategori Delete',
            'guard_name' => 'web'
        ]);

        // Semua Produk
        Permission::create([
            'name' => 'Semua Produk',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Produk Create',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Produk Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Produk Show',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Produk Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Produk Update',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Produk Delete',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Produk Delete Image',
            'guard_name' => 'web'
        ]);

        // Slide
        Permission::create([
            'name' => 'Slide',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Slide Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Slide Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Slide Update',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Slide Delete',
            'guard_name' => 'web'
        ]);

        // Navbar Promosi
        Permission::create([
            'name' => 'Navbar Promosi',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Navbar Promosi Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Navbar Promosi Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Navbar Promosi Update',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Navbar Promosi Delete',
            'guard_name' => 'web'
        ]);

        // Banner Promosi
        Permission::create([
            'name' => 'Banner Promosi',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Banner Promosi Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Banner Promosi Update',
            'guard_name' => 'web'
        ]);

        // Tiga Promosi
        Permission::create([
            'name' => 'Tiga Promosi',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Tiga Promosi Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Tiga Promosi Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Tiga Promosi Update',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Tiga Promosi Delete',
            'guard_name' => 'web'
        ]);

        // Metode Pembayaran
        Permission::create([
            'name' => 'Metode Pembayaran',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pembayaran Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pembayaran Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pembayaran Update',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Pembayaran Delete',
            'guard_name' => 'web'
        ]);

        // Role
        Permission::create([
            'name' => 'Role',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Role Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Role Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Role Update',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Role Delete',
            'guard_name' => 'web'
        ]);

        // PErmission
        Permission::create([
            'name' => 'Permission',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Permission Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Permission Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Permission Update',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Permission Delete',
            'guard_name' => 'web'
        ]);

        // Permission to Role
        Permission::create([
            'name' => 'Permission to Role',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Permission to Role Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Permission to Role Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Permission to Role Update',
            'guard_name' => 'web'
        ]);

        // Role to User
        Permission::create([
            'name' => 'Role to User',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Role to User Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Role to User Edit',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Role to User Update',
            'guard_name' => 'web'
        ]);


        // Semua User
        Permission::create([
            'name' => 'Semua User',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Semua User Change Password',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Semua User Update Password',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Semua User Status',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Semua User Login',
            'guard_name' => 'web'
        ]);

        // Privacy Policy
        Permission::create([
            'name' => 'Privacy Policy',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Privacy Policy Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Privacy Policy Update',
            'guard_name' => 'web'
        ]);

        // Terms Cpnditions
        Permission::create([
            'name' => 'Terms Conditions',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Terms Conditions Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Terms Conditions Update',
            'guard_name' => 'web'
        ]);

        // About Company
        Permission::create([
            'name' => 'About Company',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'About Company Store',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'About Company Update',
            'guard_name' => 'web'
        ]);

        // Contact Masuk
        Permission::create([
            'name' => 'Contact Masuk',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Contact Masuk Show',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Contact Masuk Delete',
            'guard_name' => 'web'
        ]);

        // Setting Info Web
        Permission::create([
            'name' => 'Setting Info Web',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Setting Info Web Wtore',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Setting Info Web Update',
            'guard_name' => 'web'
        ]);
    }
}

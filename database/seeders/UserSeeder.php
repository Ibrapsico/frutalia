<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // - Instanciamos objetos conlos diferentes roles:
        $adminRole = Role::where('name', 'admin')->first();
        $sellerRole = Role::where('name', 'seller')->first();
        $customerRole = Role::where('name', 'customer')->first();
        
        // - Creamos 10 usuarios normales (customer):
        User::factory()
            ->count(10)
            ->create()
            ->each(function($user) use ($customerRole) {
                $user->roles()->attach($customerRole);
            });

        // - Creamos 5 usuarios vendedortes (seller):
        User::factory()
            ->count(5)
            ->create()
            ->each(function($user) use ($sellerRole) {
                $user->roles()->attach($sellerRole);
            });


        // - Creamos un usuario Admin:
        $admin = User::factory()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('Admin-1122'),
            ]);
        
        $admin->roles()->attach($adminRole);

        // - Creamos un usuario Ibra vendedor:
        $ibra = User::factory()
            ->create([
                'name' => 'Ibra',
                'email' => 'ibra@gmail.com',
                'password' => bcrypt('Ibra-1122'),
            ]);

        $ibra->roles()->attach($sellerRole);


        // - Creamos un usuario Tim comprador:
        $tim = User::factory()
            ->create([
                'name' => 'Tim',
                'email' => 'tim@gmail.com',
                'password' => bcrypt('Tim-1122'),
            ]);

        $tim->roles()->attach($customerRole);


    }
}


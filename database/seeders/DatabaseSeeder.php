<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'roles' => 'Admin',
            'password' => bcrypt('password')
        ]);

        Item::create([
            'category' => 'Futsal',
            'name' => 'Sepatu Ortuseight Catalyst Red White - 40',
            'stock' => 10,
            'price_item' => 240000,
            'price_day' => 24000,
        ]);

        Item::create([
            'category' => 'Futsal',
            'name' => 'Sepatu Ortuseight Catalyst Red White - 41',
            'stock' => 10,
            'price_item' => 240000,
            'price_day' => 24000,
        ]);
    }
}

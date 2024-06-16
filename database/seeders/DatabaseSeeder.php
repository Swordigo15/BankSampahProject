<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Member;
use App\Models\Sampah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Annys',
            'email' => 'annys@gmail.com',
            'password'=> bcrypt('12345'),
            'isAdmin' => 1,
        ]);
        
        Member::create([
            'name' => 'Faza',
            'noTelp' => '081',
            'alamat' => 'jalan',
            'user_id' => '1',
        ]);

        Sampah::create([
            'name' => 'Plastik',
            'harga' => 1000,
            'satuan' => 'kg',
            'user_id' => '1'
        ]);

        Member::factory()->count(3)->create();
    }
}

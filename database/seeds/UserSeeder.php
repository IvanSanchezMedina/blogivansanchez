<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ivan',
            'last_name'=>'Sanchez',
            'email' => 'ivan@test.com',
            'password' => Hash::make('123123123123'),
        ]);
        User::create([
            'name' => 'Ulises',
            'last_name'=>'Medina',
            'email' => 'ulises@test.com',
            'password' => Hash::make('123123123123'),
        ]);
        User::create([
            'name' => 'Ana',
            'last_name'=>'Avalos',
            'email' => 'ana@test.com',
            'password' => Hash::make('123123123123'),
        ]);
    }
}

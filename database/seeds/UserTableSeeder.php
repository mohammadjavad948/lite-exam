<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' =>'mohammadjavad',
            'email' => 'mjkmo123@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('1383')
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('secret');

        User::create([
            'name'         => 'Daron Adkins',
            'email'        => 'daron@kerigan.com',
            'password'     => $password,
            'phone_number' => '850-866-6248',
            'address'      => '2418 Jason Drive, Lynn Haven FL',
            'mls_id'       => 'B3326',
            'is_realtor'   => 1
        ]);
    }
}

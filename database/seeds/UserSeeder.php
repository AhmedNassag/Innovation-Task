<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create
        ([
            'name'     => 'Ahmed Nassag',
            'email'    => 'ahmednassag@yahoo.com',
            'password' => bcrypt('20111993'),
        ]);
    }
}

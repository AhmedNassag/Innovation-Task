<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create
        ([
            'name'     => 'Ahmed Nabil',
            'email'    => 'ahmednassag@gmail.com',
            'password' => bcrypt('0101685643320111993'),
        ]);
    }
}

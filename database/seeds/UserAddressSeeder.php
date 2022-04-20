<?php

use App\UserAddress;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAddress::create
        ([
            'address'       => 'Egypt',
            'secondAddress' => 'Helwan',
            'user_id'       => 1,

        ]);
    }
}

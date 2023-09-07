<?php

use App\Model\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate([
            'name' => 'Rony Islam',
            'mobile' => '01792702312',
            'email' => 'rony.rng@gmail.com',
            'gender' => 'Male',
            'address' => 'Dhaka, Bangladesh',
            'password' => Hash::make('11111111')
        ]);
    }
}

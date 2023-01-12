<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama_lengkap"=>"admin",
            "username"=>"admin",
            "password"=>Hash::make("adminsubhanallah"),
            "role"=>"admin"
        ]);
    }
}

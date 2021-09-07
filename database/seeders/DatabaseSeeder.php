<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
        "name"=>"Administrator",
        "role"=>"admin",
        "email"=>"admin@gmail.com",
        "password"=>bcrypt("11111111"),
    ]);
    }
}

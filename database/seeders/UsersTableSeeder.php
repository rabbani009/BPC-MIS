<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Opu Hasnat',
            'email' => 'opqclick@gmail.com',
            'password' => bcrypt('hasnat'),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'BPC Admin',
            'email' => 'bpc.admin@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'role_id' => 3,
            'name' => 'BPC Executive',
            'email' => 'bpc.executive@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'role_id' => 4,
            'name' => 'Council Admin',
            'email' => 'council.admin@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'role_id' => 5,
            'name' => 'Council Executive',
            'email' => 'council.executive@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}

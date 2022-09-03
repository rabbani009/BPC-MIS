<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1.
        DB::table('roles')->insert([
            'name' => 'System Admin',
            'slug' => 'system_admin',
            'description' => 'System wide administration',
            'permissions' => 'get.login, post.login, get.dashboard',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        //2.
        DB::table('roles')->insert([
            'name' => 'Bpc Admin',
            'slug' => 'bpc_admin',
            'description' => 'application wide administration to all routes',
            'permissions' => 'get.login, post.login, get.dashboard',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        //3.
        DB::table('roles')->insert([
            'name' => 'Bpc Executive',
            'slug' => 'bpc_executive',
            'description' => 'application wide permission to specific routes',
            'permissions' => 'get.login, post.login, get.dashboard',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        //4.
        DB::table('roles')->insert([
            'name' => 'Council Admin',
            'slug' => 'council_admin',
            'description' => 'application wide permission to specific routes',
            'permissions' => 'get.login, post.login, get.dashboard',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        //5.
        DB::table('roles')->insert([
            'name' => 'Council Executive',
            'slug' => 'council_executive',
            'description' => 'application wide permission to specific routes',
            'permissions' => 'get.login, post.login, get.dashboard',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}

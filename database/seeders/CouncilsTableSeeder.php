<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouncilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('councils')->insert([
            'name' => 'IBPC',
            'slug' => 'ibpc',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('councils')->insert([
            'name' => 'LSBPC',
            'slug' => 'lsbpc',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('councils')->insert([
            'name' => 'LEPBPC',
            'slug' => 'lepbpc',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('councils')->insert([
            'name' => 'MPHPBPC',
            'slug' => 'mphpbpc',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('councils')->insert([
            'name' => 'FPBPC',
            'slug' => 'fpbpc',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('councils')->insert([
            'name' => 'APBPC',
            'slug' => 'apbpc',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        DB::table('councils')->insert([
            'name' => 'PPBPC',
            'slug' => 'ppbpc',
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'name' => 'Project',
            'slug' => 'project',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('programs')->insert([
            'name' => 'Workshop',
            'slug' => 'workshop',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('programs')->insert([
            'name' => 'Training',
            'slug' => 'training',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('programs')->insert([
            'name' => 'Seminar',
            'slug' => 'seminar',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('programs')->insert([
            'name' => 'Trade Fair (Local)',
            'slug' => 'trade_fair_local',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('programs')->insert([
            'name' => 'Trade Fair (International)',
            'slug' => 'trade_fair_international',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
    }
}

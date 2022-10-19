<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TrainersTableSeeder extends Seeder
{
    private \Faker\Generator $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainers')->insert([
            'council' => 1,
            'association' => 1,
            'program'=>1,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 1,
            'association' => 2,
            'program'=>1,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 1,
            'association' => 3,
            'program'=>1,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('trainers')->insert([
            'council' => 2,
            'association' => 8,
            'program'=>2,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 2,
            'association' => 9,
            'program'=>2,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 2,
            'association' => 10,
            'program'=>2,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('trainers')->insert([
            'council' => 3,
            'association' => 18,
            'program'=>2,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 3,
            'association' => 19,
            'program'=>2,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 3,
            'association' => 20,
            'program'=>3,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 3,
            'association' => 21,
            'program'=>3,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('trainers')->insert([
            'council' => 4,
            'association' => 24,
            'program'=>3,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 4,
            'association' => 25,
            'program'=>3,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('trainers')->insert([
            'council' => 5,
            'association' => 30,
            'program'=>3,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 5,
            'association' => 31,
            'program'=>3,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 5,
            'association' => 32,
            'program'=>3,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);

        DB::table('trainers')->insert([
            'council' => 6,
            'association' => 40,
            'program'=>4,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('trainers')->insert([
            'council' => 6,
            'association' => 41,
            'program'=>4,
            'name' => $this->faker->name('male'),
            'email' => $this->faker->safeEmail(),
            'mobile' => rand(10000000000, 10000000019),
            'gender' => 'male',
            'area_of_expertise' => 'Business Specialist, Researcher, Analyst, Training Expert',
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
    }
}

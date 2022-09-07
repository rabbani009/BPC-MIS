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

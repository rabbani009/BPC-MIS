<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssociationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('associations')->insert([
            'name' => 'Bangladesh Association of Software & Information Services (BASIS)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Association of Software & Information Services (BASIS)')),
            'belongs_to' => 1,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Computer Samity (BCS)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Computer Samity (BCS)')),
            'belongs_to' => 1,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Internet Service Providers Association of Bangladesh (ISPAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Internet Service Providers Association of Bangladesh (ISPAB)')),
            'belongs_to' => 1,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Association of Call Center & Outsourcing (BACCO)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Association of Call Center & Outsourcing (BACCO)')),
            'belongs_to' => 1,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'E-Commerce Association of Bangladesh (e-CAB)',
            'slug' => strtolower(str_replace(' ', '_', 'E-Commerce Association of Bangladesh (e-CAB)')),
            'belongs_to' => 1,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Internet Service Providers Association of Bangladesh (ISPAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Internet Service Providers Association of Bangladesh (ISPAB)')),
            'belongs_to' => 1,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Association of Call Center & Outsourcing (BACCO)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Association of Call Center & Outsourcing (BACCO)')),
            'belongs_to' => 1,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        //2
        DB::table('associations')->insert([
            'name' => 'Bangladesh Tanners Association (BTA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Tanners Association (BTA)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Leather goods & Footwear Manufacturers & Exporters Association of Bangladesh (LFMEAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Leather goods & Footwear Manufacturers & Exporters Association of Bangladesh (LFMEAB)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Electrical Merchandise Manufacturers Association (BEMMA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Electrical Merchandise Manufacturers Association (BEMMA)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'National Association of Small and Cottage Industries of Bangladesh (NASCIB)',
            'slug' => strtolower(str_replace(' ', '_', 'National Association of Small and Cottage Industries of Bangladesh (NASCIB)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Automobiles Assemblers & Manufacturers Association (BAAMA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Automobiles Assemblers & Manufacturers Association (BAAMA)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Bi-Cycle & Parts Manufacturers and Exporters Association (BBPMEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Bi-Cycle & Parts Manufacturers and Exporters Association (BBPMEA)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Accumulator Battery Manufacturers & Exporters Association of Bangladesh (ABMEAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Accumulator Battery Manufacturers & Exporters Association of Bangladesh (ABMEAB)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Finished Leather, Leather goods and Footwear Exporters Association (BFLLFEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Finished Leather, Leather goods and Footwear Exporters Association (BFLLFEA)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Tanners Association (BTA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Tanners Association (BTA)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Leather goods & Footwear Manufacturers & Exporters Association of Bangladesh (LFMEAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Leather goods & Footwear Manufacturers & Exporters Association of Bangladesh (LFMEAB)')),
            'belongs_to' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        //3
        DB::table('associations')->insert([
            'name' => 'Bangladesh Engineering Industry Owners Association (BEIOA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Engineering Industry Owners Association (BEIOA)')),
            'belongs_to' => 3,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Electrical Merchandise Manufacturers Association (BEMMA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Electrical Merchandise Manufacturers Association (BEMMA)')),
            'belongs_to' => 3,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'National Association of Small and Cottage Industries of Bangladesh (NASCIB)',
            'slug' => strtolower(str_replace(' ', '_', 'National Association of Small and Cottage Industries of Bangladesh (NASCIB)')),
            'belongs_to' => 3,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Automobiles Assemblers & Manufacturers Association (BAAMA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Automobiles Assemblers & Manufacturers Association (BAAMA)')),
            'belongs_to' => 3,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Bi-Cycle & Parts Manufacturers and Exporters Association (BBPMEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Bi-Cycle & Parts Manufacturers and Exporters Association (BBPMEA)')),
            'belongs_to' => 3,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Accumulator Battery Manufacturers & Exporters Association of Bangladesh (ABMEAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Accumulator Battery Manufacturers & Exporters Association of Bangladesh (ABMEAB)')),
            'belongs_to' => 3,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        //4
        DB::table('associations')->insert([
            'name' => 'Bangladesh Ayurvedic Medicine Manufacturer Association (BAMMA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Ayurvedic Medicine Manufacturer Association (BAMMA)')),
            'belongs_to' => 4,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Unani Aushadh Shilpa Samity (BUASS)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Unani Aushadh Shilpa Samity (BUASS)')),
            'belongs_to' => 4,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Homeopathic Medicine Manufacturers Association (BHMMA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Homeopathic Medicine Manufacturers Association (BHMMA)')),
            'belongs_to' => 4,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Herbal Products Manufacturing Association (BHPMA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Herbal Products Manufacturing Association (BHPMA)')),
            'belongs_to' => 4,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Neem Foundation (BNF)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Neem Foundation (BNF)')),
            'belongs_to' => 4,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Herbal Product, Cosmetic and Dietary Supplement Manufacturers Association of Bangladesh (HPCDSMAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Herbal Product, Cosmetic and Dietary Supplement Manufacturers Association of Bangladesh (HPCDSMAB)')),
            'belongs_to' => 4,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        //5
        DB::table('associations')->insert([
            'name' => 'Bangladesh Frozen Foods Exporters Association (BFFEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Frozen Foods Exporters Association (BFFEA)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Shrimp Hatchery Association of Bangladesh (SHAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Shrimp Hatchery Association of Bangladesh (SHAB)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Aquaculture Alliance (BAA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Aquaculture Alliance (BAA)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Non Packers Frozen Foods Exporters Association (BNPFFEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Non Packers Frozen Foods Exporters Association (BNPFFEA)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Salted & Dehydrated Marine Foods Exporters Association (BSDMFEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Salted & Dehydrated Marine Foods Exporters Association (BSDMFEA)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'National Shrimp Farmers Association (NSFA)',
            'slug' => strtolower(str_replace(' ', '_', 'National Shrimp Farmers Association (NSFA)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Shrimp and Fish Foundation (BSFF)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Shrimp and Fish Foundation (BSFF)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Fish Farm Owner\'s Association , Bangladesh (FOAB)',
            'slug' => strtolower(str_replace(' ', '_', 'Fish Farm Owner\'s Association , Bangladesh (FOAB)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Marine Fisheries Association (BMFA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Marine Fisheries Association (BMFA)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        DB::table('associations')->insert([
            'name' => 'Bangladesh Live & Chilled Food Exporters Association (BLCFEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Live & Chilled Food Exporters Association (BLCFEA)')),
            'belongs_to' => 5,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        //6
        DB::table('associations')->insert([
            'name' => 'Bangladesh Fruits, Vegetables & Allied Products Exporters Association (BFVAPEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Fruits, Vegetables & Allied Products Exporters Association (BFVAPEA)')),
            'belongs_to' => 6,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
        //7
        DB::table('associations')->insert([
            'name' => 'Bangladesh Plastic Goods Manufacturers & Exporters Association (BPGMEA)',
            'slug' => strtolower(str_replace(' ', '_', 'Bangladesh Plastic Goods Manufacturers & Exporters Association (BPGMEA)')),
            'belongs_to' => 6,
            'status' => 1,
            'created_at' => Carbon::now(),
            'created_by' => 1
        ]);
    }
}

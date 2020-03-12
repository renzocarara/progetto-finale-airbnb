<?php

use Illuminate\Database\Seeder;


class ApartmentsServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 1,
                'service_id' => 1
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 1,
                'service_id' => 2
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 1,
                'service_id' => 3
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 2,
                'service_id' => 1
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 2,
                'service_id' => 2
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 2,
                'service_id' => 3
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 2,
                'service_id' => 6
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 3,
                'service_id' => 2
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 3,
                'service_id' => 5
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 4,
                'service_id' => 2
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 4,
                'service_id' => 6
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 4,
                'service_id' => 1
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 5,
                'service_id' => 4
            ]
        ]);

        DB::table('apartments_services')->insert([
            [
                'apartment_id' => 5,
                'service_id' => 2
            ]
        ]);
    }
}
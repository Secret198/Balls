<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\ProgressBar;
use function Laravel\Prompts\table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $filePath = storage_path('../countries.csv');

        $continents = array();
        $currencies = array();
        if (($handle = fopen($filePath, 'r')) !== false) {
           
            while (($data = fgetcsv($handle, separator:";")) !== false) {
                if(!in_array($data[4], $currencies)){
                    array_push($currencies, $data[4]);
                    array_push($currencies, $data[5]);
                }

                if(!in_array($data[2], $continents)){
                    array_push($continents, $data[2]);
                }

            }
            fclose($handle);
        }
        for($i = 0;$i<count($currencies);$i+=2){
            DB::table('currencies')->insert([
                "currency_code" => $currencies[$i],
                "currency_name" => $currencies[$i+1]
            ]);
        }
        for($i = 0;$i<count($continents);$i++){
            DB::table('continents')->insert([
                "continent_name" => $continents[$i]
            ]);
        }

        if (($handle = fopen($filePath, 'r')) !== false) {
           
            while (($data = fgetcsv($handle, separator:";")) !== false) {

                DB::table("countries")->insert([
                    "code" => $data[0],
                    "name" => $data[1],
                    "capital" => $data[3],
                    "passport_validity" => $data[6],
                    "phone_code" => $data[7],
                    "timezone" => $data[8],
                    "population" => $data[9],
                    "area_km2" => $data[10],
                    "embassy_url" => $data[11],
                    "registration" => $data[12],
                    "registration_url" => $data[13],
                    "primary_rule" => $data[14],
                    "primary_rule_duration" => $data[15],
                    "secondary_rule" => $data[16],
                    "secondary_rule_duration" => $data[17],
                    "continent_id" => array_search($data[2], $continents) + 1,
                    "currency_id" => array_search($data[4], $currencies) / 2 + 1,
                ]);

            }
            fclose($handle);
        }
    }
}

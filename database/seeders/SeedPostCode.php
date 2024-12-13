<?php

namespace Database\Seeders;

use App\Models\Postcode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedPostCode extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(public_path('data/postcode.csv'), 'r');
        $firstLine = true;
        while (($data = fgetcsv($csv, 18546, ",")) !== false) {
            if (!$firstLine) {
                Postcode::create([
                    'id' => $data['0'],
                    'postcode' => $data['1'],
                    'locality' => $data['2'],
                    'state' => $data['3'],
                ]);
            }
            $firstLine = false;
        }
        fclose($csv);
    }
}

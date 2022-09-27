<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZipCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new \SplFileObject(__DIR__. '/KEN_ALL.CSV');
        $file->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        $zipcodes = [];
        $date = date('Y/m/d H:i:s');
        foreach($file as $key => $line) {
            //メモリ不足対策
            if(!($key % 800)) {
                DB::table('zipcode')->insert($zipcodes);
                $zipcodes = [];
            }

            mb_convert_variables('UTF-8', 'sjis-win', $line);
            $zipcodes[] = [
                'local_gov_id' => $line[0],
                'zip_code' => $line[2],
                'state_name' => $line[6],
                'city' => $line[7],
                'domain_name' => $line[8],
                'kana_state_name' => $line[3],
                'kana_city' => $line[4],
                'kana_domain_name' => $line[5],
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }
        if($zipcodes) {
            DB::table('zipcode')->insert($zipcodes);
        }
    }
}

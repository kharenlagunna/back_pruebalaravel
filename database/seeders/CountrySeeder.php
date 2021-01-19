<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create(['code' => 1, 
                        'description' => ' N/A', 
                        'deleted_at' => date('Y-m-d H:i:s')
        ]);

        Country::create(['code' => 13,
                       'description' => ' AFGANISTAN'
        ]);

        Country::create(['code' => 248, 
                        'description' => ' ALAND'
        ]);
    }
}

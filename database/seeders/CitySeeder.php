<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['code' => '0001', 
                        'description' => 'N/A', 
                        'departament_id' => 1, 
                        'deleted_at' => date('Y-m-d H:i:s')
        ]);

        City::create(['code' => '91263', 
                        'description' => 'EL ENCANTO', 
                        'departament_id' => 2
        ]);
            
        City::create(['code' => '91405', 
                        'description' => 'LA CHORRERA', 
                        'departament_id' => 2
        ]);
    }
}

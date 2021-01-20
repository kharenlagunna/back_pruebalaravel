<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Department::create(['code' => '1', 
                            'description' => 'N/A', 
                            'country_id' => 1, 
                            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        Department::create(['code' => '2', 
                            'description' => 'Bogotá', 
                            'country_id' => 2
        ]);

        Department::create(['code' => '3', 
                            'description' => 'Rio de Janeiro', 
                            'country_id' => 3
        ]);
    }
}

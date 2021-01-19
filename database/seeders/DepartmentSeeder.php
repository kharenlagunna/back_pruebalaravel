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
                            'country_id' => 44, 
                            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        Department::create(['code' => '91', 
                            'description' => 'AMAZONAS', 
                            'country_id' => 44
        ]);

        Department::create(['code' => '5', 
                            'description' => 'ANTIOQUIA', 
                            'country_id' => 44
        ]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;

class SelectController extends Controller
{

    // Paises 
    public function countries(Request $request){

        $country = Country::All();

        return response()->json([
            "mensaje" => $country
            
        ],200);
    
    }

      // Departamentos o Estados 
      public function departments(Request $request){

        $department = Department::find($request->id);

        return response()->json([
            "mensaje" => $department
            
        ],200);
    
    }

    // Ciudades
    public function cities(Request $request){

        $city = City::find($request->id);

        return response()->json([
            "mensaje" => $city
            
        ],200);
    
    }
}

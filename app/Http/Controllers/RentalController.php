<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RentalRequest;
use App\Models\Rental;

class RentalController extends Controller
{
    public function store(RentalRequest $request) {

        $request->validated(); 
        
        $bookings = Rental::where( "office_id", $request[ "office_id" ] )
            ->where( "startDate", "<=", $request[ "endDate"] )
            ->where( "endDate", ">=", $request[ "startDate" ])->get();

        if( count($bookings) > 0 ) {

        return response()->json( [ "error" => "Van foglalás a megadott időszakra" ] );
        }
        $bookings = Rental::create([

        "uid" => $request[ "uid" ],
        "office_id" => $request[ "office_id" ],
        "startDate" => $request[ "startDate" ],
        "endDate" => $request[ "endDate" ],
        "dailyRate" => $request[ "dailyRate" ],
        "baseFree" => $request[ "baseFree" ],
        ]);

        return response()->json( $bookings );
       
    }
}
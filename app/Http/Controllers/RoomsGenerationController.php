<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsGenerationController extends Controller
{
    public static function generate(Request $request)
    {
        $firstCount = DB::table('rooms')->select('*')->count()+1;
        $numberRooms = $request->input('number-room');
        $capacity = $request->input('capacity');
        $price = $request->input('price');

        for ($i = $firstCount; $i < $firstCount + $numberRooms; $i++) {
            DB::table('rooms')->insert([
                'type_id' => 1,
                'room_status_id' => 1,
                'number' => $i,
                'capacity' => $capacity,
                'price' => $price,
                'view' => "Insert your view description."
            ]);
        }
        $secondCount = DB::table('rooms')->select('*')->count();
        if ($secondCount>=$firstCount) {
            return redirect()->back()->with('success', 'The rooms have been generated successfully');
        }
        return redirect()->back()->with('failed', 'Something went wrong');
    }
}

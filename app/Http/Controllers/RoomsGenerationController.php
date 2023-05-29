<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsGenerationController extends Controller
{
    public static function generate(Request $request)
    {
        $hotel_id = Hotel::select('id')->where('user_id', '=', auth()->user()->id)->get();
        foreach ($hotel_id as $hotel ) {
            $hotel_id = $hotel->id;
        }
        if (auth()->user()->role == 'Super') {
            $hotel_id = $request->input('hotel_id');
        }
        $numberOfRooms = DB::table('rooms')->select('*')->where('hotel_id', '=', $hotel_id)->count();
        $firstCount = $numberOfRooms + 1;
        $numberRooms = $request->input('number-room');
        $capacity = $request->input('capacity');
        $price = $request->input('price');
        for ($i = $firstCount; $i < $firstCount + $numberRooms; $i++) {
            DB::table('rooms')->insert([
                'type_id' => 1,
                'hotel_id' => $hotel_id,
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

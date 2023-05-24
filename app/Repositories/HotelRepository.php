<?php

namespace App\Repositories;

use App\Models\Hotel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HotelRepository
{
    public function store($hotelData)
    {
        $hotel = new Hotel();
        $hotel->name = $hotelData->name;
        $hotel->country = $hotelData->country;
        $hotel->city = $hotelData->city;
        $hotel->address = $hotelData->address;
        $hotel->phone = $hotelData->phone;
        $hotel->email = $hotelData->email;
        $hotel->stars = $hotelData->stars;
        $hotel->save();
    }

    public function setOwnerId($id)
    {
        $hotel = DB::table('hotels')->select('*')->orderByDesc('id')->limit(1);
        $hotel->update(['user_id'=>$id]);
    }

}

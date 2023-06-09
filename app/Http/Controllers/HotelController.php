<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreHotelRequest;
use App\Models\Hotel;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\HotelRepository;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = Hotel::where('user_id', '=', auth()->user()->id)->first();
        if ($hotel != null) {
            return redirect()->route('waiting')->with('failed', 'You can\'t create other hotels.');
        }
        $rules = [
            "hotel_name" => ["required","max:255"],
            "hotel_address" => ["required","max:500"],
            "hotel_country" => ["required","not_regex:/Select a country/"],
            "hotel_city" => ["required","not_regex:/Select a city/"],
            "hotel_phone" => ["required","max:20"],
            "hotel_email" => ["required","email"],
            "hotel_stars" => ["required","min:1","max:5"],
        ];
        $messages = [
            "country.not_regex" => "The country field is required.",
            "city.not_regex" => "The city field is required.",
        ];

        $this->validate($request, $rules, $messages);
        $hotel = Hotel::create([
            'user_id' => auth()->user()->id,
            'name' => $request->input('hotel_name'),
            'country' => $request->input('hotel_country'),
            'city' => $request->input('hotel_city'),
            'address' => $request->input('hotel_address'),
            'phone' => $request->input('hotel_phone'),
            'email' => $request->input('hotel_email'),
            'stars' => $request->input('hotel_stars')
        ]);
        DB::table('users')->where('id', '=', $hotel->user_id)->update(['hotel_id'=>$hotel->id]);
        // $this->hotelRepository->setOwnerId(auth()->user()->id);

        return redirect('waiting')->with('wait', 'Waiting for validation for user: ' . auth()->user()->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('hotel.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

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
        $rules = [
            "name" => ["required","max:255"],
            "address" => ["required","max:500"],
            "country" => ["required","not_regex:/Select a country/"],
            "city" => ["required"],
            "phone" => ["required","max:20"],
            "email" => ["required"],
            "stars" => ["required","min:1","max:5"],
        ];
        $messages = [
            "country.not_regex" => "The country field is required.",
        ];

        $this->validate($request, $rules, $messages);
        $hotel = Hotel::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'stars' => $request->stars
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
    public function show($id)
    {
        //
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

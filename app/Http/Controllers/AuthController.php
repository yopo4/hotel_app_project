<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\HotelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

    private $userRepository;
    private $hotelRepository;

    public function __construct(UserRepository $userRepository, HotelRepository $hotelRepository)
    {
        $this->userRepository = $userRepository;
        $this->hotelRepository = $hotelRepository;
    }

    public function postLogin(PostLoginRequest $request)
    {

        if (Auth::attempt($request->only('email', 'password')) && (auth()->user()->validated == 1)) {
            return redirect('dashboard')->with('success', 'Welcome ' . auth()->user()->name);
        }
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('waiting')->with('error', 'Waiting for validation for user: ' . auth()->user()->name);
        }
        return redirect('login')->with('failed', 'Incorrect email / password');
    }

    public function logout()
    {
        // $name = auth()->user()->name;
        Auth::logout();
        return redirect('login')->with('success', 'Logout success, goodbye ');
    }

    public function waiting(Request $request)
    {
        $supers = $this->userRepository->showUser($request);

        return view('auth.waiting', compact('supers'));
    }

    public function storeAdmin(StoreUserRequest $userRequest)
    {
        $this->userRepository->store($userRequest);
        if (Auth::attempt($userRequest->only('email', 'password'))) {
            return redirect()->route('hotel.form')->with('wait', 'Waiting for validation for user: ' . auth()->user()->name);
        }
    }


}

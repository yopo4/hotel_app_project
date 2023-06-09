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
use Illuminate\Support\Str;
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
        if (Auth::attempt($request->only('email', 'password')) && (auth()->user()->role == "Customer")) {
            return redirect('/')->with('success', auth()->user()->name . ' is logged with success.');
        }
        if (Auth::attempt($request->only('email', 'password')) && (auth()->user()->role == "Admin" && auth()->user()->hotel_id != null && auth()->user()->validated == 0)) {
            return redirect('waiting')->with('error', 'Waiting for validation for user: ' . auth()->user()->name);
        }
        if (Auth::attempt($request->only('email', 'password')) && (auth()->user()->role == "Admin" && auth()->user()->hotel_id == null && auth()->user()->validated == 0)) {
            return redirect('/')->with('continue', auth()->user()->name . ' continue your registration please.');
        }
        return redirect('/')->with('failed', 'Incorrect email / password');
    }

    public function logout()
    {
        // $name = auth()->user()->name;
        Auth::logout();
        return redirect('/')->with('success', 'Logout success, goodbye ');
    }

    public function waiting(Request $request)
    {
        $supers = $this->userRepository->showUser($request);

        return view('auth.waiting', compact('supers'));
    }

    public function storeCustomer(StoreUserRequest $userRequest)
    {
        $this->userRepository->store($userRequest);
        if (Auth::attempt($userRequest->only('email', 'password'))) {
            return redirect()->route('home')->with('success', auth()->user()->name . ' is logged with success.');
        }
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'owner_email' => 'required|unique:users,email',
            'owner_password' => 'required|string|min:8',
            'role' => 'required|in:Super,Admin,Customer'
        ]);
        $data = [
            'name' => $request->input('owner_name'),
            'email' => $request->input('owner_email'),
            'password' => bcrypt($request->input('owner_password')),
            'role' => $request->input('role'),
            'random_key' => Str::random(60),
        ];
        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('home')->with(['success' => auth()->user()->name . ': your session has been created with success.', 'click' => 'click']);
    }
}

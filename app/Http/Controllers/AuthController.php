<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function postLogin(PostLoginRequest $request)
    {

        if (Auth::attempt($request->only('email', 'password')) && (auth()->user()->validated == 1)) {
            return redirect('dashboard')->with('success', 'Welcome ' . auth()->user()->name);
        }
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('waiting')->with('failed', 'Waiting for validation for user: ' . auth()->user()->name);
        }
        return redirect('login')->with('failed', 'Incorrect email / password');
    }

    public function logout()
    {
        $name = auth()->user()->name;
        Auth::logout();
        return redirect('login')->with('success', 'Logout success, goodbye ' . $name);
    }

    public function waiting(Request $request)
    {
        $supers = $this->userRepository->showUser($request);
        return view('auth.waiting', compact('supers'));
    }


    public function store(StoreUserRequest $request)
    {
        $user = $this->userRepository->store($request);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('waiting')->with('failed', 'Waiting for validation for user: ' . auth()->user()->name);
        }
    }
}

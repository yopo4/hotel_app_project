<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $users = $this->userRepository->showUser($request);
        $customers = $this->userRepository->showCustomer($request);
        return view('user.index', compact('users', 'customers'));
    }

    public function unvalidated(Request $request)
    {
        $users = $this->userRepository->showUser($request);
        $customers = $this->userRepository->showCustomer($request);
        return view('user.index', compact('users', 'customers'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->userRepository->store($request);
        if ($user->role == 'Super') {
            $user->where('id', $user->id)
                 ->update(['validated' => 1]);
        }
        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' created');
    }

    public function show(User $user)
    {
        if ($user->role === "Customer") {
            $customer = Customer::where('user_id', $user->id)->first();
            return view('customer.show', compact('customer'));
        }
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(User $user, UpdateCustomerRequest $request)
    {
        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' udpated!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' deleted!');
    }
}

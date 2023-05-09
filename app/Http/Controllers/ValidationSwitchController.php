<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ValidationSwitchController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index($id)
    {
        $storeRequest = new StoreUserRequest;
        $updateRequest = new UpdateCustomerRequest;
        $user = new User;
        $this->userRepository->store($storeRequest);
        $user->update($updateRequest->all());
        DB::table('users')->where('id', $id)->update(['validated' => 1]);
        echo "
        <script>alert('ok')</script>
        ";
    }
}

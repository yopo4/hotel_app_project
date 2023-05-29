@extends('template.master')
@section('title', 'User')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <div class="row g-0 bg-light position-relative">
                    <h3 class="p-2">Owner informations</h3>
                    <div class="col-md-4 mb-md-0 p-md-4">
                        <img src="{{ $user->getAvatar() }}" class="w-100" alt="...">
                    </div>
                    <div class="col-md-8 p-4 ps-md-0">
                        <h5 class="mt-3">Name: {{ $user->name }}</h5>
                        <div class="p-2">
                            <div class="py-1">
                                <p class="">E-mail: <span class="fw-semibold">{{ $user->email }}</span></p>
                            </div>
                            <div class="py-1">
                                <p>Role: <span class="fw-semibold">{{ $user->role }}</span></p>
                            </div>
                            <div class="mb-1">
                                <p>Hotel name: <span class="fw-semibold">{{ $hotels->name }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-0 bg-light position-relative">
                    <h3 class="p-2">Hotel informations</h3>
                    <div class="col-md-12 p-4">
                        <h5 class="mt-0">Name: {{ $hotels->name }}</h5>
                        <div class="p-3">
                            <div class="py-1">
                                <p>E-mail: <span class="fw-semibold">{{ $hotels->email }}</span></p>
                            </div>
                            <div class="py-1">
                                <p>Phone: <span class="fw-semibold">{{ $hotels->phone }}</span></p>
                            </div>
                            <div class="py-1">
                                <p>Country: <span class="fw-semibold">{{ $hotels->country }}</span></p>
                            </div>
                            <div class="py-1">
                                <p>City: <span class="fw-semibold">{{ $hotels->city }}</span></p>
                            </div>
                            <div class="py-1">
                                <p>Address: <span class="fw-semibold">{{ $hotels->address }}</span></p>
                            </div>
                            <div class="py-1">
                                <p>Number of stars: <span class="fw-semibold">{{ $hotels->stars }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                        <h5 class="mt-0">{{ $user->email }}</h5>
                        <p> Role: <span class="fw-semibold">{{ $user->role }}</span> </p>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($hotels as $hotel)
                            <p>Hotel {{ $i }}: {{ $hotel->name }}</p>
                        @php
                            $i++
                        @endphp
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="row g-0 bg-light position-relative">
                    <h3 class="p-2">Hotel informations</h3>
                    {{-- @forelse ($hotels as $hotel)
                    <div class="col-md-12 p-4 ps-md-0">
                        <h5 class="mt-0">{{ $hotel->name }}</h5>
                    </div>
                    @empty

                    @endforelse --}}
                </div>
            </div>
        </div>
    </div>
@endsection

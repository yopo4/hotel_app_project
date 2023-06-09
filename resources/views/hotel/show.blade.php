@extends('template.custom.master')
@section('title')
@section('main')
    <div class="card">
        <div class="card-body bg-light">
            <div class="row g-0 bg-light position-relative">
                <h3 class="p-2">Hotel informations</h3>
                <div class="col-md-4 mb-md-0 p-md-4">
                    <img src="{{ asset('img/hotel/' . $hotel->id . '.png') }}" class="w-100" alt="...">
                </div>
                <div class="col-md-8 p-4 ps-md-0">
                    <h5 class="card-title">{{ $hotel->name }}</h5>
                    <p class="card-text">Description de l'hôtel.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">E-mail : {{ $hotel->email }}</li>
                        <li class="list-group-item">Address : {{ $hotel->address }}</li>
                        <li class="list-group-item">Phone : {{ $hotel->phone }}</li>
                        <li class="list-group-item">Stars :
                            @for ($i = 0; $i < $hotel->stars; $i++)
                                <i class="bi bi-star-fill text-warning"></i>
                            @endfor
                        </li>
                        <li class="list-group-item">Type of the rooms :
                            @for ($i = 0; $i < count(Helper::getRoomType($hotel->id)); $i++)
                                {{ Helper::getRoomType($hotel->id)[$i] }}, 
                            @endfor
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary text-white">Reserve</a>
                </div>
            </div>
        </div>
        @include('template.custom.include._footer')
        <br>
    @endsection

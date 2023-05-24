@extends('template.auth')
@section('title', 'Register')
@section('content')
    <link href="{{ asset('style/css/stylelogin.css') }}" rel="stylesheet">
    <div class="wavestop">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1"
                d="M0,224L48,186.7C96,149,192,75,288,42.7C384,11,480,21,576,74.7C672,128,768,224,864,256C960,288,1056,256,1152,234.7C1248,213,1344,203,1392,197.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
    </div>
    <style>
        .md-country-picker-item {
            position: relative;
            line-height: 20px;
            padding: 10px 0 10px 40px;
        }

        .md-country-picker-flag {
            position: absolute;
            left: 0;
            height: 20px;
        }

        .mbsc-scroller-wheel-item-2d .md-country-picker-item {
            transform: scale(1.1);
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="glassmorphism card-signin my-5">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <img src="img/logo/sip.png" width="100" height="100" class="rounded-circle mx-auto"
                                        alt="logo" style="background-color: white;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="card-title text-center">Enter your informations</h5>
                            </div>
                        </div>

                        <form class="row g-3" id="authForm" method="POST" action="{{ route('hotel.store') }}">
                            @csrf
                            <div id="hotel-details"
                                class="row g-3">
                                <h3>Hotel informations</h3>
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror"
                                        id="country" name="country" value="{{ old('country') }}" hidden>

                                    <select id="countrySlct" name="country"
                                        class="form-select selectpicker countrypicker @error('country') is-invalid @enderror"
                                        data-live-search="true" data-default="Select a country" data-flag="true"
                                        onchange="set_city_state(this,city_state)">
                                        <option value="Select a country" selected>Select a country</option>
                                        <option value="{{ old('country') }}" @if (old('country')!="") selected @endif></option>
                                        <script type="text/javascript">
                                            setRegions(this);
                                        </script>
                                    </select>
                                    @error('country')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        id="city" name="city" value="{{ old('city') }}" hidden>
                                    <select id="citySlct" class="form-control @error('city') is-invalid @enderror" name="city_state"
                                        disabled="disabled">
                                    </select>
                                    @error('city')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="phone" class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="06 12 34 56 78" id="phone" name="phone"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="stars" class="form-label">Number of stars</label>
                                    <input type="number" class="form-control @error('stars') is-invalid @enderror"
                                        id="stars" min="1" max="5" name="stars" value="{{ old('stars') }}">
                                    @error('stars')
                                        <div class="text-danger mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-2">
                                <input type="button" value="Back" id="backBtn"
                                    class="btn btn-light shadow-sm border float-start mr-2" style="display: none;">
                                <input type="submit" value="Save" id="saveBtn"
                                    class="btn btn-light shadow-sm border float-end">
                            </div>
                        </form>
                        <hr class="my-4">
                        <p class="text-center">Already registred? <a href="/login">Login</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" name="" id="testInp" value="0" hidden>
    <div class="wavesbottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1"
                d="M0,224L48,213.3C96,203,192,181,288,154.7C384,128,480,96,576,122.7C672,149,768,235,864,234.7C960,235,1056,149,1152,117.3C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>
    <script>
        $(document).ready(function() {

            $('#countrySlct').change(function () {
                $('#country').attr('value', $('#countrySlct').val())
                console.log($('#country').val());
            })

            $('#citySlct').change(function () {
                $('#city').attr('value', $('#citySlct').val())
                console.log($('#city').val());
            })
        //     $('#saveBtn').click(function() {
        //         var test = $('#testInp').val();

        //         if (test == 0) {
        //             $("#hotel-details").show();
        //             $("#backBtn").show();
        //             $("#owner-details").hide();
        //             $('#testInp').attr('value', '1');
        //             $('#saveBtn').attr('value', 'Save');
        //         } else {
        //             $('#authForm').submit();
        //         }
        //     });
        //     $('#backBtn').click(function() {
        //         $('#testInp').attr('value', '0');

        //         $("#hotel-details").hide();
        //         $("#owner-details").show();
        //         $('#saveBtn').attr('value', 'Continue');
        //         $('#backBtn').hide();
        //     });
        });
    </script>
@endsection

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
    <div class="d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm border">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">
                                Customer
                            </h3>
                        </div>
                        <a href="{{ route('custom.register') }}">
                            <img src="{{ asset('asset/customer.jpg') }}" alt="customer_img" srcset="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">
                                Hotel owner
                            </h3>
                        </div>
                        <a href="{{ route('register') }}">
                            <img src="{{ asset('asset/owner.jpg') }}" alt="owner_img" srcset="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wavesbottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1"
                d="M0,224L48,213.3C96,203,192,181,288,154.7C384,128,480,96,576,122.7C672,149,768,235,864,234.7C960,235,1056,149,1152,117.3C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>
@endsection

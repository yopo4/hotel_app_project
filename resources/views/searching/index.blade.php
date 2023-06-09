@extends('template.custom.master')
@section('title', 'SmartStay | List of Hotels')
@section('main')

    <style type="text/css">
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }

        }

        .toast {
            position: fixed;
            /* bottom: 0; */
            z-index: 9999;
        }

        .card-body::-webkit-scrollbar {
            width: 0em;
        }
    </style>
    @if (\Session::has('success'))
        <div class="toast bg-success text-white position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-autohide="true" data-bs-delay="4000">
            <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="toast"
                    aria-label="Fermer"></button>
            </div>
            <div class="toast-body">
                {{ \Session::get('success') }}
            </div>
        </div>
    @endif
    @if (\Session::has('failed'))
        <div class="toast bg-danger text-white position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-autohide="true" data-bs-delay="4000">
            <div class="toast-header">
                <strong class="me-auto">Failed</strong>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="toast"
                    aria-label="Fermer"></button>
            </div>
            <div class="toast-body">
                {{ \Session::get('failed') }}
            </div>
        </div>
    @endif
    @if (\Session::has('continue'))
        <div class="toast bg-warning text-white position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-autohide="true" data-bs-delay="4000">
            <div class="toast-header">
                <strong class="me-auto">Continue</strong>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="toast"
                    aria-label="Fermer"></button>
            </div>
            <div class="toast-body">
                {{ \Session::get('continue') }}
            </div>
        </div>
    @endif
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('img/hotel/1.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('img/hotel/2.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('img/hotel/3.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('img/hotel/4.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('img/hotel/5.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('img/hotel/6.png') }}" class="w-100 d-block" />
                </div>

            </div>

        </div>
    </div>

    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="col-lg-3">Check hotels availability</h5>
                <form method="post" action="">
                    <div class="row align-items-end">
                        <div class="col-lg-4 mb-2">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-4 mb-2">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-2 mb-2">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-2">
                            <button type="submit" class="btn btn-dark shadow-none custom-bg">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">HOTELS</h2>
    <div class="container">
        <div class="row">
            @php
                $j = 1;
            @endphp
            @forelse ($hotels as $hotel)
                @if ($j == 7)
                    @php
                        $j = 1;
                    @endphp
                @break
            @endif
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: ; margin: auto;">
                    <img src="{{ asset('img/hotel/' . $j . '.png') }}" class="card-img-top" alt="...">

                    <div class="card-body" style="height: 180px; overflow: auto;">
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        @if (Helper::showRoomPrice($hotel->id)[0] == null)
                            <h6 class="mb-4">No rooms in this hotel.</h6>
                        @else
                            <h6 class="mt-4">Number of rooms: {{ Helper::numberOfRooms($hotel->id) }}</h6>
                            <h6 class="mb-4">From:
                                {{ Helper::convertToDirhame(Helper::showRoomPrice($hotel->id)[0]) }}
                                , to:
                                {{ Helper::convertToDirhame(Helper::showRoomPrice($hotel->id)[1]) }}</h6>
                        @endif
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                @for ($i = 0; $i < $hotel->stars; $i++)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @endfor
                            </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end mb-2">
                            <a href="{{ route('hotel.show', ['hotel' => $hotel->id]) }}"
                                class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $j++;
            @endphp
        @empty
            No data here
        @endforelse

        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>
        </div>
    </div>
</div>

{{-- 
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

<div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/Facilities/wifi.svg" width="80px">
            <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/Facilities/wifi.svg" width="80px">
            <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/Facilities/wifi.svg" width="80px">
            <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/Facilities/wifi.svg" width="80px">
            <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="images/Facilities/wifi.svg" width="80px">
            <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded rounded-0 fw-bold shadow-none">More
                Facilities >>></a>
        </div>
    </div>
</div> --}}


<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>

<div class="container mt-5">
    <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper mb-5">

            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="{{ asset('img/facilities/stars.png') }}" width="30px">
                    <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="{{ asset('img/facilities/stars.png') }}" width="30px">
                    <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="{{ asset('img/facilities/stars.png') }}" width="30px">
                    <h6 class="m-0 ms-2">Random user1</h6>
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>


<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
            <iframe class="w-100 rounded" height="320px"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63225.996807740055!2d80.97815907936754!3d7.934196847392783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afb456e05e5a4c9%3A0x72cd1cfea9d4d0a9!2sPolonnaruwa%20Ancient%20City!5e0!3m2!1sen!2slk!4v1659525623039!5m2!1sen!2slk"
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4 ">
            <div class="bg-white p-4 rounded">
                <h5>Call us</h5>
                <a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i
                        class="bi bi-telephone-fill"></i> +212 612345699</a>
                <br>
                <a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i
                        class="bi bi-telephone-fill"></i> +212 612345699</a>
            </div>
            <div class="bg-white p-4 rounded">
                <h5>Follow us</h5>
                <a href="#" class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="fa-brands fa-github me-1"></i>GitHub
                    </span>
                </a>
                <br>
                <a href="#" class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-facebook me-1"></i>Facebook
                    </span>
                </a>
                <br>
                <a href="#" class="d-inline-block">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-instagram me-1"></i>Instagram
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
@include('template.custom.include._footer')
<br>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        }
    });

    var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });

    $(document).ready(function() {
        var toastElement = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
    })
</script>
@endsection

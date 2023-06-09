<nav class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="{{ route('home') }}">{{ env('APP_NAME', 'SmartStay') }}</a>
        {{-- <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"> --}}
        {{-- <span class="navbar-toggler-icon"></span> --}}
        {{-- </button> --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" id="homeLink" aria-current="page" href="">Home</a>
                    <script>
                        $(document).ready(function() {
                            $('#homeLink').on('click', function() {
                                window.location.href = '/';
                            })
                        })
                    </script>
                </li>
                @if (auth()->check() &&
                        (auth()->user()->role == 'Super' ||
                            (auth()->user()->role == 'Admin' && auth()->user()->hotel_id != null && auth()->user()->validated == 1)))
                    <li class="nav-item">
                        <a class="nav-link me-2" href="/dashboard" id="dashboardLink">Dashboard</a>
                        <script>
                            $(document).ready(function() {
                                $('#dashboardLink').on('click', function() {
                                    window.location.href = '/dashboard';
                                })
                            })
                        </script>
                    </li>
                @endif
                @if (auth()->check() &&
                        (auth()->user()->role == 'Super' ||
                            (auth()->user()->role == 'Admin' && auth()->user()->hotel_id != null && auth()->user()->validated == 0)))
                    <li class="nav-item">
                        <a class="nav-link me-2" href="" id="waitingLink">Waiting</a>
                        <script>
                            $(document).ready(function() {
                                $('#waitingLink').on('click', function() {
                                    window.location.href = '/waiting';
                                })
                            })
                        </script>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link me-2" href="" id="contactUsLink">Contact Us</a><script>
                        $(document).ready(function() {
                            $('#contactUsLink').on('click', function() {
                                window.location.href = '/contact_us';
                            })
                        })
                    </script>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="" id="aboutlink">About</a><script>
                        $(document).ready(function() {
                            $('#aboutlink').on('click', function() {
                                window.location.href = '/about';
                            })
                        })
                    </script>
                </li>

            </ul>
            <div class="d-flex" role="search">
                @if (!auth()->check())
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-2" data-bs-toggle="modal"
                        data-bs-target="#loginModel" id="logg">Login</button>
                    <button type="button" class="btn btn-dark shadow-none" data-bs-toggle="modal"
                        data-bs-target="#registerModel" id="regg" value="Register">Register</button>
                @endif
                @if (auth()->check() && (auth()->user()->role == 'Admin' && auth()->user()->hotel_id == null))
                    <a type="button" href="{{ route('logout') }}"
                        class="btn btn-outline-dark shadow-none me-lg-2 me-2">Logout</a>
                    <button type="button" class="btn btn-dark shadow-none" data-bs-toggle="modal"
                        data-bs-target="#registerModel" id="regg" value="Continue registration">Continue
                        registration</button>
                @endif
                @if (auth()->check() &&
                        (auth()->user()->role == 'Super' ||
                            auth()->user()->role == 'Customer' ||
                            (auth()->user()->role == 'Admin' && auth()->user()->hotel_id != null)))
                    <a type="button" href="{{ route('logout') }}" class="btn btn-outline-dark shadow-none">Logout</a>
                @endif
            </div>
        </div>
    </div>
</nav>



@if ($errors->has('email') || $errors->has('password'))
    <script>
        $(document).ready(function() {
            $('#logg').click()
        })
    </script>
@endif
<div class="modal fade" id="loginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('postlogin') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"> User Login</i>
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Email address"
                            autocomplete="on"
                            class="form-control @error('email') is-invalid @enderror @if (\Session::has('failed')) is-invalid @endif">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                                {{-- <script>
                                    $(document).ready(function() {
                                        $('#logg').click()
                                    })
                                </script> --}}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror @if (\Session::has('failed')) is-invalid @endif">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                                {{-- <script>
                                    $(document).ready(function() {
                                        $('#logg').click()
                                    })
                                </script> --}}
                            </span>
                        @enderror
                        @if (\Session::has('failed'))
                            <div class="d-flex justify-content-center">
                                <p class="text-danger mb-3">
                                    {{ \Session::get('failed') }}
                                </p>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#logg').click()
                                })
                            </script>
                        @endif
                    </div>
                    {{-- <div class="d-flex align-items-center justify-content-between mb-2">
                        <a href="JavaScript: void(0)" class="text-secondary text-decoration-none">Forgot Password</a>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark shadow-none">Login</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="registerModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-lines-fill fs-3 me-2"> User Registration</i>
                </h5>
                <button type="reset" id="closeButton" class="btn-close shadow-none" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" action="" id="ownerForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <label class="form-label">Name</label>
                                <input type="text" id="name" name="owner_name" placeholder="Name"
                                    value="{{ old('owner_name') }}"
                                    class="form-control @error('owner_name') is-invalid @enderror @if (\Session::has('failed')) is-invalid @endif">
                                @error('owner_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        <script>
                                            $(document).ready(function() {
                                                $('#regg').click()
                                            })
                                        </script>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 p-0">
                                <label class="form-label">Email address</label>
                                <input type="email" id="email" name="owner_email" placeholder="Email address"
                                    autocomplete="on" value="{{ old('owner_email') }}"
                                    class="form-control @error('owner_email') is-invalid @enderror @if (\Session::has('failed')) is-invalid @endif">
                                @error('owner_email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        <script>
                                            $(document).ready(function() {
                                                $('#regg').click()
                                            })
                                        </script>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" id="password" name="owner_password" placeholder="Password"
                                    autocomplete="on"
                                    class="form-control @error('owner_password') is-invalid @enderror @if (\Session::has('failed')) is-invalid @endif">
                                @error('owner_password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        <script>
                                            $(document).ready(function() {
                                                $('#regg').click()
                                            })
                                        </script>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 p-0">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" id="confirmPassword" name="confirmPassword"
                                    placeholder="Confirm password" autocomplete="on"
                                    class="form-control @error('owner_password') is-invalid @enderror @if (\Session::has('failed')) is-invalid @endif">
                                {{-- @if (\Session::has('failed'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        <script>
                                            $(document).ready(function() {
                                                $('#regg').click()
                                            })
                                        </script>
                                    </span>
                                @endif --}}
                            </div>
                            <div class=" col-md-12 p-0">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role"
                                    class="form-select @error('role') is-invalid @enderror">
                                    <option value="Admin" @if (old('role') == 'Admin') selected @endif>
                                        Admin
                                    </option>
                                    <option value="Customer" @if (old('role') == 'Customer') selected @endif>
                                        Customer
                                    </option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                        <script>
                                            $(document).ready(function() {
                                                $('#regg').click()
                                            })
                                        </script>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center my-1">
                                <button type="submit" class="btn btn-light shadow-sm border float-end"
                                    id="nextButton">Next</button>
                            </div>
                    </form>
                </div>
            </div>
            <form class="row g-3" id="hotelForm" method="POST" action="{{ route('hotel.store') }}"
                style="display: none;">
                @csrf
                <div id="hotel-details" class="row g-3">
                    <h3>Hotel informations</h3>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('hotel_name') is-invalid @enderror"
                            id="hotel_name" name="hotel_name" value="{{ old('hotel_name') }}">
                        @error('hotel_name')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control @error('hotel_country') is-invalid @enderror"
                            id="hotel_country" name="hotel_country" value="{{ old('hotel_country') }}" hidden>

                        <select id="countrySlct" name="hotel_country"
                            class="form-select selectpicker countrypicker @error('hotel_country') is-invalid @enderror"
                            data-live-search="true" data-default="Select a hotel_country" data-flag="true"
                            onchange="set_city_state(this,city_state)">
                            <option value="Select a hotel_country" selected>Select a hotel_country</option>
                            <option value="{{ old('hotel_country') }}"
                                @if (old('hotel_country') != '') selected @endif>
                            </option>
                            <script type="text/javascript">
                                setRegions(this);
                            </script>
                        </select>
                        @error('hotel_country')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control @error('hotel_city') is-invalid @enderror"
                            id="hotel_city" name="hotel_city" value="{{ old('hotel_city') }}" hidden>
                        <select id="citySlct" class="form-control @error('hotel_city') is-invalid @enderror"
                            name="city_state" disabled="disabled">
                        </select>
                        @error('hotel_city')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        {{-- <input type="text" class="form-control @error('address') is-invalid @enderror"
                            id="address" name="address" value="{{ old('address') }}"> --}}
                        <textarea class="form-control" name="hotel_address" id="hotel_address" cols="30" rows="3"
                            value="{{ old('hotel_address') }}"></textarea>
                        @error('hotel_address')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="phone" class="form-control @error('hotel_phone') is-invalid @enderror"
                            placeholder="06 12 34 56 78" id="hotel_phone" name="hotel_phone"
                            value="{{ old('hotel_phone') }}">
                        @error('hotel_phone')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('hotel_email') is-invalid @enderror"
                            id="hotel_email" name="hotel_email" value="{{ old('hotel_email') }}">
                        @error('hotel_email')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="stars" class="form-label">Number of stars</label>
                        <input type="number" class="form-control @error('hotel_stars') is-invalid @enderror"
                            id="hotel_stars" min="1" max="5" name="hotel_stars"
                            value="{{ old('hotel_stars') }}">
                        @error('hotel_stars')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-2">
                    {{-- <input type="submit" value="Save" id="saveBtn"
                        class="btn btn-light shadow-sm border float-end"> --}}
                    <button type="submit" class="btn btn-dark shadow-none" id="saveBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (\Session::has('click'))
    <script>
        $(document).ready(function() {
            $('#regg').click()
            $('#ownerForm').hide();
            $('#hotelForm').show();
        })
    </script>
@endif
<script>
    $(document).ready(function() {
        // $('saveBtn').on('click', function() {
        //     var form = $('#hotelForm');
        //     form.attr('action', '/add_hotel');
        //     form.submit()
        // })

        $('#citySlct').change(function() {
            var selectedOption = $(this).val();
            $('#hotel_city').val(selectedOption);
        });
        $('#regg').on('click', function() {
            if ($('#regg').val() == "Register") {
                $('#ownerForm').show();
                $('#hotelForm').hide();
            } else {
                $('#ownerForm').hide();
                $('#hotelForm').show();
            }
        })
        $('.nav-link').on('click', function(e) {
            e.preventDefault();

            $('.nav-link').removeClass('active');

            $(this).addClass('active');
        });
        $('#nextButton').click(function() {
            if ($('#ownerForm')[0].checkValidity()) {
                $('#ownerForm').hide();
                $('#hotelForm').show();
            } else {
                // $('#regg').click()
                $('#resetButton').hide()
                $('#ownerForm').addClass('was-validated');
            }
        });
        $('#role').change(function() {
            var selectedOption = $(this).val();
            var form = $('#ownerForm');

            switch (selectedOption) {
                case 'Admin':
                    form.attr('action', '/admin_registration');
                    break;
                case 'Customer':
                    form.attr('action', '/custom_registration');
                    break;
            }
        });
    });
</script>

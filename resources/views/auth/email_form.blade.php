<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/logo/sip.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    @vite('resources/sass/app.scss')
    <title>@yield('title')</title>
    @yield('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand navbar-light px-1 bg-white shadow-sm fixed-top" style="height: 55px">
            <div class="container-fluid">
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ auth()->user()->getAvatar() }}" class="rounded-circle img-thumbnail"
                                style="cursor: pointer" width="40" height="40" alt="">
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            {{-- <li><a class="dropdown-item"
                                    href="{{ route('user.show', ['user' => auth()->user()->id]) }}">Profil</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Activity</a></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> --}}
                            <form action="/logout" method="POST">
                                @csrf
                                <li><button class="dropdown-item" type="submit">Logout</button></li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </header>

    <main>
        <div class="container mt-5" style="width:60%;">

            <div class="d-flex align-middle">
                <div class="justify-content-start mt-4">
                    <a class="btn btn-light" href="{{ route('waiting') }}">
                        <i class="fa-solid fa-arrow-left" style="color: #000000;"></i>
                    </a>
                </div>
                <form id="form-send-email" class="row g-3 mt-5" method="get"
                    action="{{ route('email.send') }}">
                    @csrf
                    <div class="col-md-12">
                        <label for="" class="form-label">You're mailling this mail: <span class="text-primary"
                                title="{{ $receiverEmail }}">{{ $receiverEmail }}</span></label>
                    </div>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label><br>
                        <input type="text" class="form-control" name="name" id=""
                            value="{{ auth()->user()->name }}" readonly style="width:90%;">
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Your e-mail</label><br>
                        <input type="text" class="form-control" name="sender-email" id=""
                            value="{{ auth()->user()->email }}" style="width:90%;" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="message" class="form-label">Your message</label><br>
                        <textarea class="form-control" name="message" style="width:90%;" @error('empty') is-invalid @enderror name="message"
                            rows="3"></textarea>
                        @if (\Session::has('empty'))
                            <div id="error_message" class="text-danger error">
                                {{ \Session::get('empty') }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="submit" class="btn btn-outline-dark" value="Send" style="width:10%;">
                    </div>
                </form>
            </div>

        </div>
    </main>
    <footer class="footer mt-auto py-2 shadow-sm border-top mt-3" style="background: #f8f9fa; height:55px">
        @include('template.include._footer')
    </footer>
    @vite('resources/js/app.js')
</body>

</html>

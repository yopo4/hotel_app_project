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
                            </li> --}}
                            {{-- <li><a class="dropdown-item" href="#">Activity</a></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li> --}}
                            {{-- <li>
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
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            @if (\Session::has('failed'))
                <div class="alert alert-danger">
                    {{ \Session::get('failed') }}
                </div>
            @endif
            <h1 class="">Waiting for validation...</h1>
            <h4 class="">Sorry <strong>{{ auth()->user()->name }}</strong>, but you have to wait for a super to
                accepte your registration.</h4>
            <br>
            <h4>This is the list of the supers: </h4>
            <br>
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" style="white-space: nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($supers as $super)
                                            @if ($super->role == 'Super')
                                                <tr>
                                                    <td scope="row">{{ $i }}</td>
                                                    <td>{{ $super->name }}</td>
                                                    <td>{{ $super->email }}</td>
                                                    <td>{{ $super->role }}</td>
                                                    <td>
                                                        <a id="send-btn"
                                                            href="{{ route('email_form', ['receiverEmail' => $super->email]) }}"
                                                            class="btn btn-dark btn-sm rounded shadow-sm border">
                                                            Contact
                                                        </a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    There's no data in this table
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h3>Supers</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer mt-auto py-2 shadow-sm border-top mt-3" style="background: #f8f9fa; height:55px">
        @include('template.include._footer')
    </footer>
    @vite('resources/js/app.js')
</body>

</html>

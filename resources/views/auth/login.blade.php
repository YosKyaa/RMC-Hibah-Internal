@extends('layouts.authentication.master')
@section('title', 'Login')
@section('css')
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/login-form/login-form.css') }}">
@endsection
@section('style')
    <style>
        :root {
            --default-font: "Roboto", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --heading-font: "Nunito", sans-serif;
            --nav-font: "Inter", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--heading-color);
            font-family: var(--heading-font);
        }

        /**/
        .main {
            position: relative;
            width: 1000px;
            min-width: 1000px;
            min-height: 600px;
            height: 600px;
            padding: 25px;
            background-color: #ecf0f3;
            /* box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9; */
            border-radius: 12px;
            overflow: hidden;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }
    </style>
    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            user-select: none;
        }

        /* Generic */
        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Montserrat", sans-serif;
            font-size: 12px;
            background-color: #f9f9f9;
            color: #a0a5a8;
        }

        /**/
        .main {
            position: relative;
            width: 1000px;
            min-width: 1000px;
            min-height: 600px;
            height: 600px;
            padding: 25px;
            background-color: #f9f9f9;
            box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #d1d9e6;
            border-radius: 12px;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="form" id="b-form" method="POST" action="{{ route('login') }}">
                <h2 class="form_title title">Masuk ke RMC System</h2>
                <div class="form__icons">
                    <a class="btn rounded-pill btn-icon btn-outline-dark" onclick="Klas2Login()" title="Single Sign-On JGU (User Klas)">
                        <img style="max-height: 20px;" src="{{asset('assets/img/favicon.png')}}">
                    </a>
                    <a class="btn rounded-pill btn-icon btn-outline-dark" href="{{ url('login/google') }}" title="Login with (Email JGU / Gmail)">
                        <img style="max-height: 20px;" src="https://avatars.githubusercontent.com/u/19180220?s=200&v=4">
                    </a>
                </div>


                <span class="form__span">atau gunakan akun anda</span>
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control @error('login') is-invalid @enderror" name="login" id="floatingInput"
                        aria-describedby="floatingInputHelp" value="{{ old('login') }}" placeholder="Email or Username"
                        type="text" required autofocus>
                    <label for="floatingInput">Email / Username</label>
                    @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating">
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                        name="password" required autocomplete="current-password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <a class="form__link" href="{{ route('password.request') }}">Lupa password?</a>
                <button class="form__button button" type="submit">MASUK</button>
            </form>
        </div>
        <div class="container b-container" id="b-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Fields for name, username, email, and password -->
                <div class="form-floating mb-0">
                    <input class="form-control  @error('name') is-invalid @enderror" name="name" id="name"
                        value="{{ old('name') }}" placeholder="Name" required autofocus>
                    <label for="name">Nama</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="form-floating mb-0">
                    <input class="form-control  @error('username') is-invalid @enderror" name="username" id="username"
                        value="{{ old('username') }}" placeholder="Username" required autofocus>
                    <label for="username">Username</label>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="form-floating mb-0">
                    <input class="form-control  @error('email') is-invalid @enderror" name="email" id="email"
                        value="{{ old('email') }}" placeholder="Email" type="email" required autofocus>
                    <label for="email">Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="form-floating mb-0">
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                        name="password" required placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="form-floating mb-0">
                    <input class="form-control" id="password-confirm" type="password"
                        name="password_confirmation" required placeholder="Confirm Password">
                    <label for="password-confirm">Confirm Password</label>
                </div>
            
                <button type="submit" class="form__button button">Register</button>
            </form>
            
        </div>
        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            <div class="switch__container" id="switch-c1">
                <h2 class="switch__title title">Selamat datang !</h2>
                <p class="switch__description description">Untuk tetap terhubung dengan kami, silakan masuk dengan informasi pribadi Anda.
                </p>
                <button class="switch__button button switch-btn">REGRISTRASI</button>
            </div>
            <div class="switch__container is-hidden" id="switch-c2">
                <h2 class="switch__title title">Hello!</h2>
                <p class="switch__description description">Masukkan detail pribadi Anda dan ajukan proposal Anda!</p>
                <button class="switch__button button switch-btn">MASUK</button>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        let switchCtn = document.querySelector("#switch-cnt");
        let switchC1 = document.querySelector("#switch-c1");
        let switchC2 = document.querySelector("#switch-c2");
        let switchCircle = document.querySelectorAll(".switch__circle");
        let switchBtn = document.querySelectorAll(".switch-btn");
        let aContainer = document.querySelector("#a-container");
        let bContainer = document.querySelector("#b-container");
        let allButtons = document.querySelectorAll(".submit");

        let getButtons = (e) => e.preventDefault()

        let changeForm = (e) => {

            switchCtn.classList.add("is-gx");
            setTimeout(function() {
                switchCtn.classList.remove("is-gx");
            }, 1500)

            switchCtn.classList.toggle("is-txr");
            switchCircle[0].classList.toggle("is-txr");
            switchCircle[1].classList.toggle("is-txr");

            switchC1.classList.toggle("is-hidden");
            switchC2.classList.toggle("is-hidden");
            aContainer.classList.toggle("is-txl");
            bContainer.classList.toggle("is-txl");
            bContainer.classList.toggle("is-z200");
        }

        let mainF = (e) => {
            for (var i = 0; i < allButtons.length; i++)
                allButtons[i].addEventListener("click", getButtons);
            for (var i = 0; i < switchBtn.length; i++)
                switchBtn[i].addEventListener("click", changeForm)
        }

        window.addEventListener("load", mainF);
    </script>
@endsection

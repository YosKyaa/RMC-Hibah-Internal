@extends('layouts.authentication.master')

@section('content')

    <body>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#">
                <!-- <div class="d-flex col-lg-5 align-items-center authentication-bg p-sm-5 p-4"> -->
            <div class="w-px-270 mx-auto text-center justify-content-center">
                <!-- Logo -->
                <div class="app-brand justify-content-center mb-4">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/CIS.png') }}" width="250">
                        </span>
                    </div>
                <!-- /Logo -->
                <h4>Sing up</h4>
                <div class="row">
                    <div class="my-2">
                        <div class="mb-2">Create your account with</div>
                        @error('msg')
                        <br><span class="text-danger text-center">{!! $message !!}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="col-6 mb-1">
                        <div class="btn-showcase">
                        <a class="btn btn-outline-dark btn-block w-100" onclick="Klas2Login()" title="Single Sign-On JGU">
                            <img style="max-height: 20px;" 
                                src="https://s.jgu.ac.id/assets/img/favicon.png">
                                <span>SSO JGU</span>
                        </a>
                        </div>
                    </div>
                    <br>
                    <div class="col-6 mb-1">
                        <div class="btn-showcase">
                            <a class="btn btn-outline-dark btn-block w-100" href="{{ url('login/google') }}"
                                title="Log in with Email">
                                <img style="max-height: 20px;"
                                    src="https://avatars.githubusercontent.com/u/19180220?s=200&v=4">
                                <span>Google</span>
                            </a>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="divider mt-3">
                    <div class="divider-text">© {{ (date('Y')=="2022"?date('Y'):"2022-".date('Y')) }}</div>
                </div>
                <div class="footer">
                    <span class="mr-2">Dikembangkan oleh </span>
                    <a href="https://itic.jgu.ac.id/" target="_blank" class="footer-link fw-bolder ml-2">ITIC JGU</a>
                </div>
                <small class="ml-4 text-center text-sm text-light sm:text-right sm:ml-0">
                    v{{ Illuminate\Foundation\Application::VERSION }} (v{{ PHP_VERSION }})
                </small>
            </div>
        <!-- </div> -->
        <!-- /Login -->
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                    <div class="app-brand justify-content-center mb-4">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/CIS.png') }}" width="250">
                        </span>
                    </div>
                <h4>Sing in</h4>
                     @csrf
                     <!-- email -->
                    <div class="mb-3">
                        <div class="field-outlined">
				<input type="text" class="input form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" required>
				<label for="" class="label">Email</label>
				<span class="line"></span>
                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end email -->
                    <!-- pass -->
                    <div class="mb-3">
                        <div class="field-outlined">
                            <input id="password" type="password"
                                class="input form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" required>
                            <label for="" class="label">Password</label>
                            <span class="line"></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- end pass -->
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-outline-dark btn-block w-100" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                    <div class="app-brand justify-content-center mb-4">
                    <a href="https://jgu.ac.id/" target="_blank" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <img src="{{asset('assets/img/jgu.png')}}" width="150">
                        </span>
                    </a>
                </div>
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="btn btn-outline-light" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                    <div class="app-brand justify-content-center mb-4">
                    <a href="https://jgu.ac.id/" target="_blank" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <img src="{{asset('assets/img/jgu.png')}}" width="150">
                        </span>
                    </a>
                </div>
                        <h1>RMC System JGU</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="btn btn-outline-light" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </body>
    </footer>
@endsection

@section('style')
    <style>
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto Condensed', sans-serif;
            background: #f6f5f7;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: 700px;
            color: #fff;
        }

        p {
            font-size: 14px;
            font-weight: 100px;
            line-height: 20px;
            letter-spacing: .5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        .field-outlined {
            display: block;
            position: relative;
        }

        .field-outlined > .input {
            width: 100%;
            height: 56px;
            font-size: 16px;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.87);
            outline: none;
        }
        
        .field-outlined > .label{
            font-size: 16px;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.6);
            pointer-events: none;
            transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: absolute;
            top: 16px;
        }

        .field-outlined > .input:focus ~ .label, .field-outlined > .input:valid ~ .label {
            background: #ffffff;
            top: -8px;
            left: 10px;
            font-size: 12px;
            padding: 0 8px;
        }

        .field-outlined > .input {
            padding: 0 16px;
            border-radius: 4px;
            border: 1px solid rgba(0, 0, 0, 0.22);
        }

        .field-outlined > .input:hover {
            border-color: rgba(0, 0, 0, 0.42);
        }

        .field-outlined > .input:focus {
            border: 2px solid #e1a440;
        }

        .field-outlined > .input:focus ~ .label {
            color: #e1a440;
        }

        .field-outlined > .label {
            left: 16px;
        }

        .valid .field-outlined > input:valid {
            border: 2px solid #e1a440;
        }

        .valid input:valid ~ label {
            color: #e1a440;
        }

        .valid input:valid ~ .line {
            width: 100%;
            background: #e1a440;
        }

        /*  */

        /*  */
        .container {
            background: #fff;
            border-radius: 10px;
            -webkit-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            -webkit-transition: all .6s ease-in-out;
            transition: all .6s ease-in-out;
        }

        .form-container form {
            background: #ffffff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            text-align: center;
        }

        .form-container input {
            /* background: #eeeeee; */
            border: none;
            padding: 12px 15px;
            width: 100%;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            -webkit-transition: -webkit-transform .6s ease-in-out;
            transition: -webkit-transform .6s ease-in-out;
            transition: transform .6s ease-in-out;
            transition: transform .6s ease-in-out, -webkit-transform .6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: #ff416c;
            background: -webkit-gradient(linear, left top, right top, from(#e1a440), to(#ff416c)) no-repeat 0 0/cover;
            background: linear-gradient(to right, #e1a440, #ff416c) no-repeat 0 0/cover;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            -webkit-transform: translateX(0);
            transform: translateX(0);
            -webkit-transition: -webkit-transform .6s ease-in-out;
            transition: -webkit-transform .6s ease-in-out;
            transition: transform .6s ease-in-out;
            transition: transform .6s ease-in-out, -webkit-transform .6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0 40px;
            height: 100%;
            width: 50%;
            text-align: center;
            -webkit-transform: translateX(0);
            transform: translateX(0);
            -webkit-transition: -webkit-transform .6s ease-in-out;
            transition: -webkit-transform .6s ease-in-out;
            transition: transform .6s ease-in-out;
            transition: transform .6s ease-in-out, -webkit-transform .6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            -webkit-transform: translateX(0%);
            transform: translateX(0%);
        }

        .overlay-left {
            -webkit-transform: translateX(-20%);
            transform: translateX(-20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #ddd;
            border-radius: 50%;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        button {
            border-radius: 20px;
            border: 1px solid #e1a440;
            background: #e1a440;
            color: #fff;
            font-size: 12px;
            font-weight: 700px;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            -webkit-transition: -webkit-transform 80ms ease-in;
            transition: -webkit-transform 80ms ease-in;
            transition: transform 80ms ease-in;
            transition: transform 80ms ease-in, -webkit-transform 80ms ease-in;
        }

        button.sign-up-button {
            margin-top: 20px;
        }

        button:active {
            -webkit-transform: scale(0.95);
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background: transparent;
            border-color: #fff;
        }

        .container.right-panel-active .sign-in-container {
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
        }

        .container.right-panel-active .overlay-container {
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
        }

        .container.right-panel-active .sign-up-container {
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        .container.right-panel-active .overlay {
            -webkit-transform: translateX(50%);
            transform: translateX(50%);
        }

        .container.right-panel-active .overlay-left {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            -webkit-transform: translateX(20%);
            transform: translateX(20%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto Condensed', sans-serif;
            background: #f6f5f7;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: 700px;
        }

        p {
            font-size: 14px;
            font-weight: 100px;
            line-height: 20px;
            letter-spacing: .5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
            color: black;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all .6s ease-in-out;

            form {
                background: #ffffff;
                display: flex;
                flex-direction: column;
                padding: 0 50px;
                height: 100%;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            input {
                /* background: #eeeeee; */
                border: none;
                padding: 12px 15px;
                width: 100%;
            }
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform .6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: #ff416c;
            background: linear-gradient(to right, #e1a440, #e1a440) no-repeat 0 0 / cover;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform .6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            height: 100%;
            width: 50%;
            text-align: center;
            transform: translateX(0);
            transition: transform .6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateX(0%);
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .social-container {
            margin: 20px 0;

            a {
                border: 1px solid #ddd;
                border-radius: 50%;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                margin: 0 5px;
                height: 40px;
                width: 40px;
            }
        }

        button {
            border-radius: 20px;
            border: 1px solid #e1a440;
            background: #e1a440;
            color: #fff;
            font-size: 12px;
            font-weight: 700px;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;

            &.sign-up-button {
                margin-top: 20px;
            }

            &:active {
                transform: scale(.95);
            }

            &:focus {
                outline: none;
            }
        }

        button.ghost {
            background: transparent;
            border-color: #fff;
        }


        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }


        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
@endsection

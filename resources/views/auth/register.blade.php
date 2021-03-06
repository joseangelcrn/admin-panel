@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row" style="height:500px;">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form  method="POST" action="{{ route('register') }}" class="user">

                            @csrf

                            <div class="form-group row">
                                <div class="col">
                                    <input
                                    type="text"
                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                    id="name"
                                    placeholder="Nombre"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input
                                    type="text"
                                    class="form-control form-control-user @error('user_name') is-invalid @enderror"
                                    id="user_name"
                                    placeholder="Nombre de usuario"
                                    name="user_name"
                                    value="{{ old('user_name') }}"
                                    required
                                    autofocus>
                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- 2º row --}}
                            <div class="form-group row">
                                <div class="col">
                                    <input
                                    type="text"
                                    class="form-control form-control-user @error('first_surname') is-invalid @enderror"
                                    id="first_surname"
                                    placeholder="Primer apellido"
                                    name="first_surname"
                                    value="{{ old('first_surname') }}"
                                    required
                                    autofocus>
                                    @error('first_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input
                                    type="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Email Address"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    >

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- 3º row --}}
                            <div class="form-group row">
                                <div class="col">
                                    <input
                                    type="text"
                                    class="form-control form-control-user @error('second_surname') is-invalid @enderror"
                                    id="second_surname"
                                    placeholder="Segundo apellido"
                                    name="second_surname"
                                    value="{{ old('second_surname') }}"
                                    required
                                    autofocus>
                                    @error('second_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input
                                    type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="exampleInputPassword"
                                    placeholder="Password"
                                    name="password"
                                    required autocomplete="new-password"
                                    required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- 4º row --}}
                            <div class="form-group row">
                                <div class="col">

                                </div>
                                <div class="col">
                                    <input
                                    type="password"
                                    class="form-control form-control-user"
                                    id="password-confirm" placeholder="Repeat Password"
                                    name="password_confirmation"
                                    >
                                </div>
                            </div>
                            {{-- --------- --}}

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

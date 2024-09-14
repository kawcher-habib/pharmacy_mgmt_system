@extends('layout.app')
@section('content')
    <div class="card mb-3">

        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center logo w-auto py-4">

                <img src="{{ url('assets/img/Pharmacy_logo.png') }}" alt="">

            </div><!-- End Logo -->

            <div class="pt-2 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                <p class="text-center small">Enter your email & password to login</p>
            </div>

                @include('showmessage.showmessage')
            <form method="POST" action="{{ url('login/submit') }}" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                    <label for="yourEmail" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback">Please enter your email.</div>

                    </div>
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                </div>

              

                <div class="col-12">
                    <p><a href="{{ url('/forgotpass') }}"> Forgot Password</a></p>

                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="{{ url('/reg') }}">Create an account</a></p>
                </div>
            </form>

        </div>
    </div>
@endsection

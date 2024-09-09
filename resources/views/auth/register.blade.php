@extends('layout.app');
@section('content')
    <div class="card mb-3">

        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center logo w-auto py-4">

                <img src="{{ url('assets/img/Pharmacy_logo.png') }}" alt="">

            </div><!-- End Logo -->
            <div class="pt-1 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
            </div>

            <form method="POST" action="{{ url('reg/submit') }}" class="row g-3 needs-validation" novalidate>
              @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <label for="fName" class="form-label">First Name</label>
                            <input type="text" name="fname" class="form-control" id="fName" required>
                            <div class="invalid-feedback">Please, enter your first name!</div>
                        </div>
                        <div class="col-6">
                            <label for="lName" class="form-label">Last Name</label>
                            <input type="text" name="lname" class="form-control" id="lName" required>
                            <div class="invalid-feedback">Please, enter your last name!</div>
                        </div>
                    </div>

                </div>

                <div class="col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                        <div class="col-6">
                            <label for="cfPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="cfpassword" class="form-control" id="cfPassword" required>
                            <div class="invalid-feedback">Please enter confirm password!</div>
                        </div>
                    </div>

                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms"
                            required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and
                                conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="{{ url('/login') }}">Log in</a></p>
                </div>
            </form>

        </div>
    </div>
@endsection

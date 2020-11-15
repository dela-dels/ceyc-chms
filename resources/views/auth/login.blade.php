<!-- Description -->
@extends('layouts/fullLayoutMaster')

@section('title', 'CEYC-AC GIVING PORTAL - Login')

@section('pageStyle')

    <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">

@endsection

@section('content')

<section class="row flexbox-container">
    <div class="col-xl-8 col-10 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                    <img src="{{ asset('/images/pages/register.jpg') }}" alt="branding-logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 p-2">
                        <div class="card-header pt-50 pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Login</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                @include('layouts.flash-messages._error')
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right btn-inline
                                    mb-50 btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ HTML Markup -->

@endsection

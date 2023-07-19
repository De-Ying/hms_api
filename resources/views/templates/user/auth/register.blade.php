@extends('templates.layouts.auth')

@section('content')
    <!-- account section start -->
    <section class="account-section">
        <div class="left sign-up">
            <div class="top-el">
                <img src="{{ URL::to('public/assets/templates/images/bg/ele-bg2.png') }}" alt="image">
            </div>
            <div class="bottom-el">
                <img src="{{ URL::to('public/assets/templates/images/bg/ele-bg.png') }}" alt="image">
            </div>
            <div class="account-form-area">
                <div class="text-center">
                    <a href="{{ route('home') }}" class="account-logo"><img
                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}" alt="image"></a>
                </div>
                <form method="POST" action="{{ route('user.postRegister') }}" onsubmit="return submitUserForm();"
                    class="account-form mt-5">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label>@lang('Name')</label>
                                <input type="text" name="name" value="{{ old('Name') }}"
                                    placeholder="@lang('Enter Name')" class="form--control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label for="email">@lang('E-Mail Address')</label>
                                <input id="email" type="email" class="form--control checkUser"
                                    placeholder="@lang('Enter your email address')" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="form-group hover-input-popup">
                                <label for="password">@lang('Password')</label>
                                <input id="password" type="password" class="form--control" name="password"
                                    placeholder="@lang('Enter your password')" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="form-group">
                                <label for="password-confirm">@lang('Confirm Password')</label>
                                <input id="password-confirm" type="password" class="form--control"
                                    name="password_confirmation" placeholder="@lang('Enter your confirmation password')" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" id="recaptcha" class="btn btn--base w-100">@lang('Register')</button>
                        </div>
                        <div class="row gy-1">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6 text-lg-end">
                                <a href="{{ route('user.login') }}" class="text--base">@lang('Have an account?')</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="right bg_img sign-up"
            style="background-image: url('{{ getImage('public/assets/images/frontend/login/62075a78e99771644649080.jpg', '1920x2190') }}')">
            <div class="content text-center">
                <h2 class="title text-white">Find Your Own Hotel</h2>
                <p class="text-white mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti laboriosam
                    dolor est beatae a possimus cumque quaerat, provident.</p>
            </div>
        </div>
    </section>
    <!-- account section end -->
@endsection

{{-- @push('modal')
    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                    <button type="button" class="btn btn-sm btn--danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">@lang('You already have an account please Sign in ')</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('Close')</button>
                    <a href="{{ route('user.login') }}" class="btn btn--base">@lang('Login')</a>
                </div>
            </div>
        </div>
    </div>
@endpush --}}

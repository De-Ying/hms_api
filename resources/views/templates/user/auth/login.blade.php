@extends('templates.layouts.auth')

@push('style')
    <style>
        .custom-login-error {
            padding: 6px 12px;
            background: antiquewhite;
            margin-bottom: 12px;
            border-radius: 6px;
        }
    </style>
@endpush

@section('content')
    <!-- account section start -->
    <section class="account-section">
        <div class="left">
            <div class="top-el">
                <img src="{{ URL::to('public/assets/templates/images/bg/ele-bg2.png') }}" alt="image">
            </div>
            <div class="bottom-el">
                <img src="{{ URL::to('public/assets/templates/images/bg/ele-bg.png') }}" alt="image">
            </div>
            <div class="account-form-area">
                <div class="text-center">
                    <a href="" class="account-logo"><img
                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}" alt="image"></a>
                </div>
                <form method="POST" action="{{ route('user.postLogin') }}" onsubmit="return submitUserForm();"
                    class="account-form mt-5">
                    @csrf
                    <div class="form-group">
                        <label>@lang('Email')</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="@lang('Email')"
                            class="form--control">
                    </div>
                    <div class="form-group">
                        <label>@lang('Password')</label>
                        <input id="password" type="password" class="form--control" placeholder="@lang('Password')"
                            name="password">
                    </div>
                    {{-- <p class="text-end">
                        <a href="{{ route('user.password.request') }}"
                            class="text--dark">@lang('Forgot password?')</a>
                    </p> --}}
                    <p class="text-end">
                        <a href=""
                            class="text--dark">@lang('Forgot password?')</a>
                    </p>
                    <div class="form-group mt-4">
                        <button type="submit" id="recaptcha" class="btn btn--base w-100">@lang('Login Now')</button>
                    </div>
                    <div class="row gy-1">
                        <div class="col-lg-6">
                            <div class="form-check custom--checkbox">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    @lang(' Remember me')
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 text-lg-end">
                            <a href="{{ route('user.register') }}" class="text--base">@lang('Haven\'t an account?')</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="right bg_img"
            style="background-image: url('{{ getImage('public/assets/images/frontend/login/62075a78e99771644649080.jpg', '1920x2190') }}')">
            <div class="content text-center">
                <h2 class="title text-white">Find Your Own Hotel</h2>
                <p class="text-white mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti laboriosam dolor est beatae a possimus cumque quaerat, provident.</p>
            </div>
        </div>
    </section>
    <!-- account section end -->
@endsection


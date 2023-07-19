<header class="header">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="site-logo site-title" href="{{ route('home') }}"><img
                        src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu ms-auto">
                        <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                        <li><a href="{{ route('property.search') }}">@lang('Properties')</a></li>
                    </ul>
                    <div class="nav-right d-flex flex-wrap" style="gap:10px">
                        @if (!Session::has('user_id'))
                            <div class="d-flex flex-wrap" style="gap:10px">
                                <a href="{{ route('user.login') }}"
                                    class="btn btn-sm btn-outline--base">@lang('Login')</a>
                                <a href="{{ route('user.register') }}"
                                    class="btn btn-sm btn-outline--base">@lang('Register')</a>
                            </div>
                        @else
                            <div class="d-flex flex-wrap" style="gap:10px">
                                <a href="#" class="d-flex" style="align-items: center; color: black">
                                    {{ Session:: get('user_name')}}
                                </a>
                                <a href="{{ route('user.logout') }}" type="submit" class="btn btn-sm btn--base">@lang('Logout')</a>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div><!-- header__bottom end -->
</header>

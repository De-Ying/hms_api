<footer class="footer bg_img"
    style="background-image: url('{{ getImage('public/assets/images/frontend/footer/61cdac5c147871640868956.jpg', '1920x840') }}');">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-sm-6 order-lg-1 order-1">
                <div class="footer-widget">
                    <a href="{{ route('home') }}" class="footer-logo"><img
                            src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}" alt="image"></a>
                    <p class="mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tempore vel pariatur nesciunt laudantium assumenda minus quod aliquid tenetur tempora.
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 order-lg-2 order-3">
                <div class="footer-widget">
                    <h4 class="footer-widget__title"><span>@lang('Site Links')</span></h4>
                    <ul class="footer-menu-list">
                        {{-- <li><a href="{{ route('property.search') }}">@lang('Properties')</a></li>
                        <li><a href="{{ route('locations') }}">@lang('Locations')</a></li> --}}

                        <li><a href="">@lang('Properties')</a></li>
                        <li><a href="">@lang('Locations')</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 order-lg-3 order-4">
                <div class="footer-widget">
                    <h4 class="footer-widget__title"><span>@lang('Importants links')</span></h4>
                    <ul class="footer-menu-list">
                        {{-- @foreach ($policyPages as $policyPage)
                            <li>
                                <a href="{{ route('policy', [$policyPage, slug($policyPage->data_values->title)]) }}">
                                    {{ __($policyPage->data_values->title) }}
                                </a>
                            </li>
                        @endforeach --}}
                        <a href="">
                            Privacy Policy
                        </a>
                        <li><a href="{{ route('user.register') }}">@lang('User Registration')</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 order-lg-4 order-2">
                <div class="footer-widget">
                    <h4 class="footer-widget__title"><span>@lang('Contact Info')</span></h4>
                    <ul class="footer-contact-list">
                        <li>
                            <div class="icon">
                                <i class="las la-phone-volume"></i>
                            </div>
                            <div class="content">
                                <a href="tel:2454541544">+123456789</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="las la-map-marker-alt"></i>
                            </div>
                            <div class="content">
                                <p>48 Thái Hà</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="las la-phone-volume"></i>
                            </div>
                            <div class="content">
                                <a href="mailto:demo@gmail.com">example@gmail.com</a>
                            </div>
                        </li>
                        <li>
                            <ul class="social-media-list d-flex flex-wrap align-items-center">
                                <li><a href="" target="_blank">@php echo '<i class="lab la-linkedin-in"></i>' @endphp</a>
                                </li>
                                <li><a href="" target="_blank">@php echo '<i class="fab fa-twitter"></i>' @endphp</a>
                                </li>
                                <li><a href="" target="_blank">@php echo '<i class="lab la-facebook-f"></i>' @endphp</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- row end -->
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>&copy; {{ date('Y') }} . 'HotelLab' . @lang('All Right Reserved')</p>
                </div>
            </div>
        </div>
    </div>
</footer>

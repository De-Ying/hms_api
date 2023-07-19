<!-- location section start -->
<section class="pt-100 pb-100 bg_img location-section"
    style="background-image: url('{{ getImage('public/assets/images/frontend/location/61cd8b6347a371640860515.jpg', '1920x1280') }}');">
    <div class="container-fluid">
        <div class="row justify-content-xl-end justify-content-center">
            <div class="col-xl-3 col-lg-6 col-md-8 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="section-header text-xl-start text-center">
                    <h2 class="section-title">Discover best location for your next trip.</h2>
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum inventore fugiat
                        earum voluptas similique quibusdam quasi voluptatibus. Qui, minima minus.</p>
                    <a href="#" class="btn btn--base mt-4">Discover All</a>
                </div>
            </div>
            <div class="col-xxl-7 col-xl-9 ps-4">
                <div class="location-slider">
                    {{-- @foreach ($locations as $location)
            @if ($location->image) --}}
                    <div class="single-slide">
                        <div class="location-card has--link rounded-3">
                            <a href="#" class="item--link"></a>
                            <img src="{{ getImage(imagePath()['location']['path'] . '/' . '64a85029b1c121688752169.jpg', imagePath()['location']['size']) }}"
                                alt="image">
                            <div class="overlay-content">
                                <div class="top">
                                </div>
                                <div class="bottom">
                                    <h4 class="location-name text-white">Đà Nẵng</h4>
                                    <p class="text-white fs--14px">@lang('Average price') <span class="float-end">$40</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="location-card has--link rounded-3">
                            <a href="#" class="item--link"></a>
                            <img src="{{ getImage(imagePath()['location']['path'] . '/' . '64a85029b1c121688752169.jpg', imagePath()['location']['size']) }}"
                                alt="image">
                            <div class="overlay-content">
                                <div class="top">
                                </div>
                                <div class="bottom">
                                    <h4 class="location-name text-white">Đà Nẵng</h4>
                                    <p class="text-white fs--14px">@lang('Average price') <span class="float-end">$40</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="location-card has--link rounded-3">
                            <a href="#" class="item--link"></a>
                            <img src="{{ getImage(imagePath()['location']['path'] . '/' . '64a85029b1c121688752169.jpg', imagePath()['location']['size']) }}"
                                alt="image">
                            <div class="overlay-content">
                                <div class="top">
                                </div>
                                <div class="bottom">
                                    <h4 class="location-name text-white">Đà Nẵng</h4>
                                    <p class="text-white fs--14px">@lang('Average price') <span class="float-end">$40</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endif
            @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- location section end -->

<!-- hero section start -->
<section class="hero bg_img"
    style="background-image: url('{{ getImage('public/assets/images/frontend/banner/61cd85a17d5201640859041.jpg', '1920x1195') }}')">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-lg-8 text-center">
                <h2 class="hero__title text-white wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">Explore the
                    best hotels of the whole world.</h2>
                <p class="hero__description text-white mt-3 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea perspiciatis fugit eveniet accusamus
                    quos vel, quo amet ipsum mollitia nobis.</p>
            </div>
            <div class="col-xxl-10 mt-5 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                <div class="hero-search-area rounded-3">
                    {{-- <form action="{{ route('property.search') }}" class="hero-search-form"> --}}
                    <form action="" class="hero-search-form">
                        <div class="row gy-3 align-items-center">
                            <div class="col-xl-3 col-lg-3 col-sm-6">
                                <label>@lang('Location')</label>
                                <div class="input-group border px-2 radius-5">
                                    <span class="input-group-text"><i class="las la-map-marker"></i></span>
                                    <select class="select2-basic" name="location" id="location">
                                        <option value="">@lang('Select One')</option>
                                        {{-- @foreach ($locations as $location)
                                            <option value="{{ $location->id }}" @if (old('location') == $location->id) selected="selected" @endif>{{ __($location->name) }}</option>
                                        @endforeach --}}
                                        <option value="1">Đà Nẵng</option>
                                        <option value="2">Hà Nội</option>
                                        <option value="3">Hải Phòng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-6">
                                <label>@lang('Checkin - Checkout')</label>
                                <div class="input-group border px-2 radius-5">
                                    <span class="input-group-text"><i class="las la-calendar-check"></i></span>
                                    <input type="text" data-range="true" name="date"
                                        data-multiple-dates-separator=" - " data-language="en"
                                        class="datepicker-here form--control" id="date"
                                        placeholder="Checkin & Checkout" autocomplete="off" value="{{ old('date') }}">
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-6">
                                <label>@lang('Adult')</label>
                                <div class="input-group border px-2 radius-5">
                                    <span class="input-group-text"><i class="las la-user"></i></span>
                                    <input type="number" name="adult" autocomplete="off"
                                        value="{{ old('adult') ? old('adult') : 1 }}" min="1" id="adult"
                                        class="form--control">
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-sm-6">
                                <label>@lang('Child')</label>
                                <div class="input-group border px-2 radius-5">
                                    <span class="input-group-text"><i class="las la-child"></i></span>
                                    <input type="number" name="child" autocomplete="off"
                                        value="{{ old('child') ? old('child') : 0 }}" min="0" id="child"
                                        class="form--control">
                                </div>
                            </div>
                            <div class="col-lg-2 text-end align-self-end">
                                <button type="submit" class="btn btn--base w-100">@lang('Search')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero section end -->

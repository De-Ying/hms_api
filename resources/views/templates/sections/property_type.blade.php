<!-- property section start -->
<section class="pt-100 pb-100 property-section">
    <div class="bg-el">
        <img src="{{ asset('public/assets/templates/images/bg/ele-bg.png') }}" alt="image">
    </div>
    <div class="bg-el2">
        <img src="{{ asset('public/assets/templates/images/bg/ele-bg2.png') }}" alt="image">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 wow fadeInUp">
                <div class="section-header text-center">
                    <h2 class="section-title">Choose best property type</h2>
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et maxime tenetur autem similique exercitationem error libero perferendis ex veritatis molestias.</p>
                </div>
            </div>
        </div>

        <div class="property-slider wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
            {{-- @foreach ($propertyTypes as $propertyType) --}}
                <div class="single-slide">
                    <div class="property-card rounded-3 has--link">
                        <a href="#"
                            class="item--link"></a>
                        <div class="property-card__thumb rounded-2">
                            <img src="{{ getImage(imagePath()['property_type']['path'] . '/' . '64a8504a2fff31688752202.jpg', imagePath()['property_type']['size']) }}"
                                alt="image">
                        </div>
                        <div class="property-card__content text-center">
                            <h4 class="title">Bàn</h4>
                            <span class="fs--14px">0
                                Bàn</span>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
</section>
<!-- property section end -->

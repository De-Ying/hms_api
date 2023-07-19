<!-- how work section start -->
<section class="pt-100 pb-100 bg_img how-work-section"
    style="background-image: url('{{ getImage('public/assets/images/frontend/works/61cd93f54844f1640862709.jpg', '1920x1090') }}')">
    <div class="left-el">
        <img src="{{ getImage('public/assets/images/frontend/works/61cdb6fd2f2e81640871677.png', '575x755') }}"
            alt="image">
    </div>
    <div class="right-el">
        <img src="{{ getImage('public/assets/images/frontend/works/61cdb6fd48ace1640871677.png', '665x785') }}"
            alt="image">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <div class="section-subtitle">How it Works</div>
                    <h2 class="section-title">Save Your Time &amp; enjoy Your Trip</h2>
                </div>
            </div>
        </div><!-- row end -->
        <div class="row gy-4">
            {{-- @foreach ($works as $work) --}}
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <div class="work-card">
                        <div class="work-card__number">1</div>
                        <div class="work-card__content">
                            <h3 class="title">Create an account</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <div class="work-card">
                        <div class="work-card__number">2</div>
                        <div class="work-card__content">
                            <h3 class="title">Search desire hotel</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <div class="work-card">
                        <div class="work-card__number">3</div>
                        <div class="work-card__content">
                            <h3 class="title">Book the hotel</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <div class="work-card">
                        <div class="work-card__number">4</div>
                        <div class="work-card__content">
                            <h3 class="title">Enjoy your holiday</h3>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
</section>
<!-- how work section end -->

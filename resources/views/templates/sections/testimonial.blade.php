<!-- testimonial section start -->
<section class="pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="section-header text-center">
                    <h2 class="section-title">Our Happy travelers</h2>
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, incidunt quisquam accusamus cupiditate neque aut dolor minus repellendus obcaecati consequuntur.</p>
                </div>
            </div>
        </div><!-- row end -->
        <div class="testimonial-slider wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
            {{-- @foreach ($testimonialElements as $testimonial) --}}
            <div class="single-slide">
                <div class="testimonial-item">
                    <div class="thumb">
                        <img src="{{ getImage('public/assets/images/frontend/testimonial/61cd910cf214a1640861964.jpg', '440x290') }}" alt="image">
                    </div>
                    <div class="content">
                        <p class="testimonial-speech">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint laudantium quis velit delectus molestias. Animi quae in nam, sed, quis, odit aut cumque voluptatum nihil possimus accusantium modi. Deserunt, optio. Maiores possimus eos vitae quam odit mollitia, ipsam aperiam temporibus. Blanditiis eligendi atque sapiente perferendis magni ullam rerum laborum labore incidunt libero.
                        </p>
                        <div class="traveller-review mt-4 d-flex align-items-center justify-content-between">
                            <h6 class="name">-Sayara Ahmed</h6>
                            <div class="ratings">
                                {{-- @for($i=0; $i < $testimonial->data_values->star; $i++) --}}
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                    <i class="las la-star"></i>
                                {{-- @endfor --}}
                            </div>
                        </div>
                    </div>
                </div><!-- testimonial-item end -->
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</section>
<!-- testimonial section end -->

<!-- blog section start -->
<section class="pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Get inspired by latest blogs</h2>
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, incidunt quisquam accusamus cupiditate neque aut dolor minus repellendus obcaecati consequuntur.</p>
                </div>
            </div>
        </div><!-- row end -->
        <div class="row gy-4">
            {{-- @foreach ($blogs as $blog) --}}
                <div class="col-md-6 col-lg-4">
                <div class="blog-post">
                    <a href="#" class="t-link blog-post__img">
                    <img
                        src="{{ getImage('public/assets/images/frontend/blog/thumb_620d12df75f161645023967.jpg', '430x275') }}"
                        alt="viserfly"
                        class="blog-post__img-is"
                    />
                    </a>
                    <div class="blog-post__body">
                    <div class="blog-post__date">
                        <h2 class="text-white">30</h2>
                            <p class="text-white text-capitalize">Dec</p>
                    </div>
                    <h4 class="text-capitalize mb-3 mt-0">
                        <a href="#" class="t-link blog-post__title">
                            Nam Odio Molestias Possimus Perspiciatis.
                        </a>
                    </h4>
                    <ul class="list list--row">
                        <li class="list--row__item">
                        <div class="blog-post__meta">
                            <div class="blog-post__meta-icon me-2">
                                <i class="las la-clock"></i>
                            </div>
                            <div class="blog-post__meta-text text-uppercase">
                                <span class="blog-post__link">1 year ago</span>
                            </div>
                        </div>
                        </li>
                    </ul>
                        <p class="blog-post__article mt-3 mb-0">
                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui maosuere eget, vest...
                        </p>
                    </div>
                </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
</section>
<!-- blog section end -->

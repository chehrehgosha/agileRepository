@extends('layouts.template')
@section('bodystyle')
product-page sidebar-collapse
@endsection
@section('content')
  
<div class="page-header header-filter" data-parallax="true" filter-color="rose" style="background-image: url('{{ asset('assets/img/bg6.jpg') }}');">
    <div class="container">
      <div class="row title-row">
        <div class="col-md-4 ml-auto">
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="main main-raised main-product">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="tab-content">
              <img src="{{ asset('assets/img/product1.jpg') }}">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <h2 class="title">{{ $product->name }}</h2>
            <h3 class="main-price">{{ $product->price }} <small>تومان</small></h3>
            <div id="accordion" role="tablist">
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      توضیحات کالا
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <p>{{ $product->description }}</p>
                  </div>
                </div>
              </div>
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="headingTwo">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      فروشنده
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                  <ul>
                      <li>{{ $product->user_name . ' ' . $product->user_family  }}</li>
                      <li>شماره تماس : {{ $product->user_phone_number}}</li>
                      <li>ایمیل :‌ {{ $product->user_email}}</li>
                      <li>شهر :‌ {{ $product->city_name}}</li>
                      <li>محله :‌ {{ $product->district_name}}</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="headingThree">
                  <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      ویژگی ها
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <ul>
                    @foreach ($attrs as $attr)
                      <li>{{ $attr }}</li>
                    @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row pick-size">
            </div>
            <div class="row pull-right">
              <button class="btn btn-rose btn-round">خرید<i class="material-icons">shopping_cart</i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {


      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-46172202-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();

      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
@endsection
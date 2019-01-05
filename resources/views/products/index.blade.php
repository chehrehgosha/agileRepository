@extends('layouts.template')

@section('content')
  <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../assets/img/examples/bg2.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h2 class="title">لیست کالاها</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised text-right">
    <div class="container">
      <div class="card card-plain">
        <div class="card-body">
          <!-- -->
          <form class="row">
            <div class="col-lg-3 col-sm-4">
              <div class="form-group has-default">
                <input name="category" type="text" class="form-control" placeholder="دسته بندی">
              </div>
            </div>
            <div class="col-lg-3 col-sm-4">
              <div class="form-group has-default">
                <input name="city" type="text" class="form-control" placeholder="شهر">
              </div>
            </div>
            <div class="col-lg-3 col-sm-4">
              <div class="form-group has-default">
                <input name="district" type="text" class="form-control" placeholder="محله">
              </div>
            </div>
            <div class="col-lg-3 col-sm-4">
              <div class="form-group has-default">
                <input name="attributes" type="text" class="form-control" placeholder="ویژگی">
              </div>
            </div>
            <div class="col-lg-3 col-sm-4">
              <div class="form-group has-default">
                <input name="min_price" type="text" class="form-control" placeholder="کمترین قیمت">
              </div>
            </div>
            <div class="col-lg-3 col-sm-4">
              <div class="form-group has-default">
                <input name="max_price" type="text" class="form-control" placeholder="بیشترین قیمت">
              </div>
            </div>
            <div class="col-lg-3 col-sm-4">
              <div class="form-group has-default">
              <a href="/products"> <button type="button" class="btn btn-info btn-round">از نو</button></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-4">
              <div class="form-group has-default">
                <input type="submit" value="جستجو" class="btn btn-info btn-round">
              </div>
            </div>
          </form>
          <!-- -->
          <br/>
          <div class="table-responsive">
            <table class="table table-shopping">
              <thead>
                <tr>
                  <th class="text-center"></th>
                  <th class="text-right">نام</th>
                  <th class="text-right">دسته بندی</th>
                  <th class="text-right">قیمت</th>
                  <th class="text-right">شهر</th>
                  <th class="text-right">محله</th>
                  <th class="text-right">فروشنده</th>
                  <th class="text-center"></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach ($products as $product)
                <tr>
                  <td>
                    <div class="img-container">
                      <img src="{{ asset('assets/img/product' . $product->id . '.jpg') }}" alt="...">
                    </div>
                  </td>
                  <td>
                    <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                  </td>
                  <td>
                  {{ $product->category_name }}
                  </td>
                  <td class="td-number">
                  {{ $product->price }}<small>تومان</small>
                  </td>
                  <td>
                    {{ $product->city_name }}
                  </td>
                  <td>
                    {{ $product->district_name }}
                  </td>
                  <td>
                    {{ $product->user_name }}
                  </td>
                  <td class="text-left">
                    <a href="/products/{{ $product->id }}"> <button type="button" class="btn btn-info btn-round">خرید<i class="material-icons">keyboard_arrow_left</i></button></a>
                  </td>
                </tr>
              @endforeach
                <tr>
                  <td colspan="1"></td>
                </tr>
              </tbody>
            </table>
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
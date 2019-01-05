@extends('layouts.template')
@section('bodystyle')
signup-page sidebar-collapse
@endsection
@section('content')
  
<div class="page-header header-filter" filter-color="purple" style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-signup">
            <h2 class="card-title text-center">ثبت کالا</h2>
            <div class="card-body">
              <div class="row">
              <div class="col-md-5 mr-auto">
                  <div class="social text-center">
                    <h4>ثبت اطلاعات کالا</h4>
                  </div>
                  <form class="form" method="post" action="">
                  @csrf
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        <input name="name" type="text" class="form-control" placeholder="نام...">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        <input name="price" type="text" class="form-control" placeholder="قیمت...">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">mail</i>
                          </span>
                        </div>
                        <input name="category" class="form-control"  type="text" list="categories" placeholder="دسته بندی..." />
                        <datalist id="categories">
                        @foreach ($categories as $category)
                        <option value="{{ $category->name }}"></option>
                        @endforeach
                        </datalist>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input name="city" class="form-control"  type="text" list="cities" placeholder="شهر..." />
                        <datalist id="cities">
                        @foreach ($cities as $city)
                        <option value="{{ $city->name }}"></option>
                        @endforeach
                        </datalist>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input name="district" class="form-control"  type="text" list="districts" placeholder="منطقه..." />
                        <datalist id="districts">
                        @foreach ($districts as $district)
                        <option value="{{ $district->name }}"></option>
                        @endforeach
                        </datalist>
                      </div>
                    </div>
                </div>
                <div class="col-md-5 mr-auto">
                  <div class="social text-center">
                    <h4>جزییات بیشتر</h4>
                  </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">mail</i>
                          </span>
                        </div>
                        <textarea name="description" class="form-control" rows="4" id="exampleInputTextarea" placeholder=" توضیحات..."></textarea>
                      </div>
                    </div>
                    <small>&nbsp&nbsp&nbsp&nbspویژگی ها را با , از یکدیگر جدا کنید.</small>
                    <div class="form-group">
                      <div class="input-group">
                      
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        
                        <input name="attributes" type="text" class="form-control" placeholder="ویژگی ها...">
                      </div>
                    </div>
                    <div class="text-center">
                      <input type="submit" value="ثبت کالا" class="btn btn-primary btn-round">
                    </div>
                  </form>
                </div>
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
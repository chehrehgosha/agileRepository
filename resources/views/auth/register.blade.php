@extends('layouts.template')

@section('content')
<div class="page-header header-filter" style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
          <form method="POST" action="{{ route('register') }}">
          @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">ثبت نام</h4>
                <div class="social-line">
                  <a href="#" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
              <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="name" class="form-control" placeholder="نام...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">perm_identity</i>
                    </span>
                  </div>
                  <input type="text" name="family" class="form-control" placeholder="نام خانوادگی...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="ایمیل...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">phone_iphone</i>
                    </span>
                  </div>
                  <input type="text" name="phone_number" class="form-control" placeholder="شماره تماس...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="رمز...">
                </div>
              </div>
              <div class="footer text-center">
              <button type="submit" class="btn btn-primary">
                                    تایید
                                </button>
                                
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</div>

@endsection

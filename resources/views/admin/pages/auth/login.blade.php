@extends('admin.layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper " style="background-image: asset({{ asset('images/others/profile.png') }})">
              <img src="{{ asset('/assets/images/others/logo-placeholder.png')  }}" alt="">

            </div>
          </div>
          <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">Medix<span>World</span></a>
              <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>


              <form class="forms-sample" method="POST" action="{{ route('admins.login',app()->getLocale()) }}">
                @csrf
                @if (isset($errors) && count($errors))

                There were {{count($errors->all())}} Error(s)
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }} </li>
                  @endforeach
                </ul>

                @endif
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="userEmail" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password" name="password">
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div>
                <div>
                  <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Login</button>
                  <!-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="twitter"></i>
                    Login with twitter
                  </button> -->
                </div>
                <a href="{{ route('website.register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection